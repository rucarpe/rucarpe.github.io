### Cheatsheet de Frigate NVR

Frigate es un Network Video Recorder (NVR) optimizado para detección de objetos y análisis de video en tiempo real. Está diseñado para funcionar de manera eficiente utilizando hardware como la Coral TPU y se integra fácilmente con sistemas como Home Assistant.

Este cheatsheet cubre los comandos y configuraciones más importantes de **Frigate** para ayudarte a gestionar tus cámaras, configuraciones y eventos de detección.

---

#### 1. **Instalación de Frigate con Docker Compose**

Frigate se ejecuta de manera eficiente utilizando Docker. A continuación, un archivo básico de `docker-compose.yml` para configurar Frigate:

```yaml
version: '3.9'
services:
  frigate:
    container_name: frigate
    image: blakeblackshear/frigate:stable
    privileged: true
    restart: unless-stopped
    shm_size: '64mb'
    ports:
      - "5000:5000"  # API de Frigate
      - "1935:1935"  # RTMP
    environment:
      FRIGATE_RTSP_PASSWORD: "your_password"
    volumes:
      - /etc/frigate/config.yml:/config/config.yml:ro
      - /media/frigate/clips:/media/frigate/clips
      - /media/frigate/recordings:/media/frigate/recordings
      - /dev/bus/usb:/dev/bus/usb  # Solo si usas Coral USB
      - /etc/localtime:/etc/localtime:ro
    devices:
      - /dev/dri/renderD128  # Para usar aceleración por hardware
```

- **shm_size:** Ajusta el tamaño de la memoria compartida, recomendado para mejorar el rendimiento en cámaras.
- **ports:** Puertos que expone Frigate para la API y flujos de RTMP.
- **volumes:** Especifica las rutas para la configuración, clips y grabaciones.
- **devices:** Añade dispositivos como Coral TPU o aceleración de hardware.

---

#### 2. **Configuración Básica del Archivo `config.yml`**

El archivo `config.yml` define las cámaras, detecciones, almacenamiento y otras configuraciones importantes para Frigate. Aquí tienes una configuración básica:

```yaml
mqtt:
  host: "192.168.1.100"  # Dirección del broker MQTT (opcional)
  user: "usuario_mqtt"
  password: "contraseña_mqtt"

cameras:
  front_yard:
    ffmpeg:
      inputs:
        - path: rtsp://user:password@192.168.1.101:554/stream
          roles:
            - detect
            - rtmp
    width: 1920
    height: 1080
    fps: 5
    objects:
      track:
        - person
        - car
    snapshots:
      enabled: true
      retain:
        default: 10  # Retener 10 días los snapshots
```

- **mqtt:** Opcional, usado para la integración con MQTT (como Home Assistant).
- **cameras:** Define las cámaras que Frigate debe monitorear, con detalles como la ruta RTSP, resolución, FPS, y los objetos que debe detectar.
- **snapshots:** Captura y retención de imágenes cuando se detectan objetos.

---

#### 3. **Configuración de Cámaras**

Las cámaras se definen en el archivo `config.yml` bajo la clave `cameras`. Aquí tienes algunas opciones importantes:

- **ffmpeg.inputs.path:** Ruta RTSP del flujo de video de la cámara.
  ```yaml
  ffmpeg:
    inputs:
      - path: rtsp://user:password@192.168.1.101:554/stream
  ```

- **width y height:** Define la resolución de la cámara (necesario para la detección correcta de objetos).
  ```yaml
  width: 1920
  height: 1080
  ```

- **fps:** Define los frames por segundo que Frigate capturará de la cámara.
  ```yaml
  fps: 5
  ```

- **motion.mask:** Define áreas en la cámara donde no se debe detectar movimiento, útil para reducir falsas alarmas.
  ```yaml
  motion:
    mask:
      - 0,1080,1920,1080,1920,900,0,900
  ```

---

#### 4. **Detección de Objetos**

Frigate soporta la detección de varios tipos de objetos, tales como personas, vehículos, animales, entre otros.

- **Activar la detección de objetos específicos:**
  ```yaml
  objects:
    track:
      - person
      - car
      - dog
  ```

- **Ajustar la zona de detección (zonas de interés):**
  ```yaml
  zones:
    front_yard_zone:
      coordinates: 0,1080,960,1080,960,540,0,540
  ```

- **Excluir áreas de detección:**
  Puedes utilizar máscaras para ignorar áreas con ruido, como árboles en movimiento.
  ```yaml
  motion:
    mask:
      - 0,1080,1920,900,0,900
  ```

---

#### 5. **Grabación de Video y Clips de Eventos**

Frigate graba videos y genera clips de eventos cuando se detecta un objeto relevante.

- **Configuración de grabación continua:**
  ```yaml
  record:
    enabled: true
    retain_days: 7  # Retener grabaciones durante 7 días
  ```

- **Configuración de clips de eventos:**
  ```yaml
  clips:
    enabled: true
    retain:
      default: 10  # Retener clips de eventos por 10 días
  ```

---

#### 6. **Integración con MQTT (Home Assistant)**

Frigate puede publicar eventos de detección en un broker MQTT, lo que lo hace ideal para su integración con sistemas domóticos como Home Assistant.

- **Configurar MQTT en `config.yml`:**
  ```yaml
  mqtt:
    host: "192.168.1.100"  # Dirección del broker MQTT
    user: "usuario_mqtt"
    password: "contraseña_mqtt"
    topic_prefix: frigate  # Prefijo para los eventos MQTT
  ```

- **Ejemplo de evento MQTT:**
  Cuando Frigate detecta una persona, publica el evento en un tema como `frigate/front_yard/person`.

---

#### 7. **Acceso y Visualización de Video**

Frigate expone una interfaz web y un flujo RTMP para ver las cámaras en tiempo real y acceder a las grabaciones.

- **Acceder a la interfaz web de Frigate:**
  Abre el navegador y accede a:
  ```
  http://<IP_DEL_SERVIDOR>:5000
  ```

- **Ver transmisión RTMP:**
  Frigate genera flujos RTMP que pueden ser utilizados para visualización en otras aplicaciones.
  ```
  rtmp://<IP_DEL_SERVIDOR>/live/front_yard
  ```

---

#### 8. **Acceso a los Logs**

Puedes revisar los logs del contenedor para solucionar problemas y verificar que Frigate esté funcionando correctamente.

- **Ver los logs del contenedor:**
  ```bash
  docker logs frigate
  ```

- **Reiniciar Frigate:**
  ```bash
  docker-compose restart frigate
  ```

---

#### 9. **Optimización con Coral TPU**

El uso de Coral TPU permite que Frigate procese los flujos de video de manera mucho más eficiente. Para habilitar el Coral TPU:

- **Configurar Coral TPU en `docker-compose.yml`:**
  ```yaml
  devices:
    - /dev/bus/usb:/dev/bus/usb  # Coral USB
  ```

- **Habilitar Coral en `config.yml`:**
  ```yaml
  detect:
    enable_corals: True
  ```

---

#### 10. **Solución de Problemas Comunes**

- **Frigate no detecta objetos:**
  - Verifica la configuración de la cámara, como la resolución y FPS.
  - Revisa los logs del contenedor para errores (`docker logs frigate`).

- **Alta utilización de CPU:**
  - Reduce los FPS en la configuración de las cámaras.
  - Asegúrate de estar utilizando Coral TPU si es posible.

---

### Comandos Rápidos de Docker para Frigate

- **Iniciar Frigate con Docker Compose:**
  ```bash
  docker-compose up -d
  ```

- **Detener Frigate:**
  ```bash
  docker-compose down
  ```

- **Ver los logs del contenedor:**
  ```bash
  docker logs frigate
  ```

- **Reiniciar el contenedor:**
  ```bash
  docker-compose restart frigate
  ```

---

Este cheatsheet te ayudará a configurar y gestionar Frigate NVR de manera efectiva, desde la detección de objetos hasta la integración con Home Assistant. Puedes personalizar aún más la configuración para adaptarla a tus necesidades de vigilancia y seguridad.
