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


### Configuración de MQTT Mosquitto con Frigate NVR

Frigate NVR se integra perfectamente con **MQTT**, lo que permite enviar notificaciones en tiempo real sobre eventos de detección a sistemas de automatización como **Home Assistant**. **Mosquitto** es un broker MQTT muy común que puedes utilizar para gestionar esta comunicación.

A continuación, te muestro cómo configurar **Mosquitto** y vincularlo con **Frigate** para que puedas recibir eventos de detección y trabajar con ellos en Home Assistant u otros sistemas.

---

#### 1. **Instalar Mosquitto en Docker**

Usaremos **Docker** para ejecutar **Mosquitto** fácilmente.

1. Crea un archivo `docker-compose.yml` para Mosquitto:

   ```yaml
   version: '3'
   services:
     mosquitto:
       image: eclipse-mosquitto:latest
       container_name: mosquitto
       ports:
         - "1883:1883"  # Puerto para MQTT
         - "9001:9001"  # Puerto para WebSockets (opcional)
       volumes:
         - ./mosquitto/config:/mosquitto/config
         - ./mosquitto/data:/mosquitto/data
         - ./mosquitto/log:/mosquitto/log
       restart: unless-stopped
   ```

2. Crea las carpetas necesarias para la configuración:

   ```bash
   mkdir -p mosquitto/config mosquitto/data mosquitto/log
   ```

3. Dentro del directorio `mosquitto/config`, crea el archivo de configuración `mosquitto.conf`:

   ```ini
   persistence true
   persistence_location /mosquitto/data/
   log_dest file /mosquitto/log/mosquitto.log
   listener 1883
   allow_anonymous true  # Cambia a false si prefieres requerir autenticación
   ```

4. Inicia el contenedor Mosquitto:

   ```bash
   docker-compose up -d
   ```

   Esto ejecutará **Mosquitto** en el puerto 1883 de tu máquina.

---

#### 2. **Configurar MQTT en Frigate**

Frigate utiliza **MQTT** para publicar eventos de detección. Debemos configurar Frigate para que se conecte a Mosquitto.

1. Abre el archivo `config.yml` de **Frigate** y añade la sección de **MQTT**:

   ```yaml
   mqtt:
     host: "localhost"  # O la IP del servidor que ejecuta Mosquitto
     port: 1883  # Puerto MQTT (normalmente 1883)
     topic_prefix: frigate  # Prefijo para los temas publicados por Frigate
     user: "tu_usuario"  # Solo si configuras autenticación en Mosquitto
     password: "tu_contraseña"  # Solo si configuras autenticación en Mosquitto
   ```

2. Si decidiste habilitar autenticación en **Mosquitto** (con usuarios y contraseñas), puedes configurar un archivo de contraseñas MQTT en el directorio de configuración de Mosquitto:

   1. Crea el archivo de contraseñas en `mosquitto/config`:
      ```bash
      touch mosquitto/config/passwordfile
      ```

   2. Utiliza el siguiente comando para añadir un usuario y contraseña (necesitas tener `mosquitto_passwd` instalado):
      ```bash
      mosquitto_passwd -c mosquitto/config/passwordfile tu_usuario
      ```

   3. Modifica el archivo `mosquitto.conf` para habilitar la autenticación:

      ```ini
      allow_anonymous false
      password_file /mosquitto/config/passwordfile
      ```

   4. Reinicia **Mosquitto** con Docker para aplicar los cambios:

      ```bash
      docker-compose restart mosquitto
      ```

3. Reinicia el contenedor de **Frigate** para que aplique la configuración de MQTT:

   ```bash
   docker-compose restart frigate
   ```

---

#### 3. **Configuración de MQTT en Home Assistant**

Home Assistant puede conectarse a **Mosquitto** para recibir eventos de Frigate y ejecutar automatizaciones. Para configurarlo:

1. Ve a **Supervisor** en Home Assistant y busca el complemento **Mosquitto broker** (si prefieres instalarlo directamente en Home Assistant).

2. Si ya tienes **Mosquitto** corriendo en Docker (como en este caso), añade la integración **MQTT** en **Configuración** → **Integraciones** → **Agregar integración** → **MQTT**.

3. Ingresa los detalles de conexión a tu broker **Mosquitto**:
   - **Host:** `localhost` o la IP de tu servidor Docker.
   - **Puerto:** `1883`.
   - **Usuario** y **contraseña** (si habilitaste autenticación en Mosquitto).

---

#### 4. **Temas Publicados por Frigate**

Frigate publicará eventos de detección en temas **MQTT**, que puedes usar en Home Assistant o cualquier sistema que soporte MQTT. Los temas incluyen información sobre los eventos de detección y son útiles para automatizaciones y notificaciones.

- **Ejemplo de un tema MQTT de Frigate:**
  ```plaintext
  frigate/front_yard/person
  ```

- **Estructura del tema:**
  ```
  <topic_prefix>/<nombre_cámara>/<tipo_de_objeto>
  ```

- **Tipos de objetos detectados:** `person`, `car`, `dog`, etc.

---

#### 5. **Automatizaciones en Home Assistant con Frigate**

Una vez configurado **MQTT**, puedes crear automatizaciones basadas en los eventos publicados por Frigate.

**Ejemplo: Enviar una notificación cuando Frigate detecta una persona en el patio frontal:**

```yaml
automation:
  - alias: Notificación de persona detectada por Frigate
    trigger:
      platform: mqtt
      topic: "frigate/front_yard/person"
    action:
      service: notify.mobile_app_your_device
      data:
        message: "Se ha detectado una persona en el patio frontal."
```

- **Trigger:** Se activa cuando se publica un evento en el tema `frigate/front_yard/person`.
- **Action:** Envía una notificación al dispositivo móvil registrado.

---

### Resumen de Comandos Rápidos

- **Iniciar Mosquitto con Docker:**
  ```bash
  docker-compose up -d
  ```

- **Reiniciar Mosquitto:**
  ```bash
  docker-compose restart mosquitto
  ```

- **Verificar los logs de Mosquitto:**
  ```bash
  docker logs mosquitto
  ```

- **Iniciar Frigate con Docker:**
  ```bash
  docker-compose up -d
  ```

- **Reiniciar Frigate:**
  ```bash
  docker-compose restart frigate
  ```

---

### Conclusión

Con esta configuración, tendrás **Frigate** publicando eventos de detección en **Mosquitto**, y puedes aprovechar esos eventos en **Home Assistant** para crear automatizaciones, notificaciones y mucho más. Esta integración te brinda una poderosa herramienta para gestionar tu sistema de videovigilancia de manera más inteligente.
