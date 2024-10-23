### Cheatsheet de Docker

Este cheatsheet de Docker recopila los comandos más importantes para trabajar con contenedores, imágenes, redes y volúmenes. Es ideal tanto para principiantes como para usuarios con más experiencia que necesiten una referencia rápida.

---

#### 1. **Gestión de Imágenes**

| Comando                                    | Descripción                                                       | Ejemplo                            |
|--------------------------------------------|-------------------------------------------------------------------|------------------------------------|
| `docker pull <imagen>`                     | Descarga una imagen de Docker Hub                                 | `docker pull ubuntu`               |
| `docker images`                            | Lista las imágenes locales                                        | `docker images`                    |
| `docker rmi <imagen>`                      | Elimina una imagen local                                          | `docker rmi ubuntu`                |
| `docker build -t <nombre_imagen> <path>`   | Crea una imagen desde un Dockerfile                               | `docker build -t mi_imagen .`      |
| `docker tag <imagen> <nombre_nuevo>`       | Etiqueta una imagen con un nuevo nombre                           | `docker tag ubuntu:latest ubuntu:1.0`|
| `docker search <nombre_imagen>`            | Busca una imagen en Docker Hub                                    | `docker search nginx`              |

---

#### 2. **Gestión de Contenedores**

| Comando                                    | Descripción                                                       | Ejemplo                            |
|--------------------------------------------|-------------------------------------------------------------------|------------------------------------|
| `docker run <imagen>`                      | Crea y ejecuta un contenedor basado en una imagen                 | `docker run ubuntu`                |
| `docker run -it <imagen> <comando>`        | Ejecuta un contenedor en modo interactivo con una terminal         | `docker run -it ubuntu bash`       |
| `docker run -d <imagen>`                   | Ejecuta un contenedor en segundo plano (modo detached)             | `docker run -d nginx`              |
| `docker ps`                                | Lista los contenedores en ejecución                               | `docker ps`                        |
| `docker ps -a`                             | Lista todos los contenedores (incluidos los detenidos)             | `docker ps -a`                     |
| `docker start <contenedor>`                | Inicia un contenedor detenido                                     | `docker start nombre_contenedor`   |
| `docker stop <contenedor>`                 | Detiene un contenedor en ejecución                                | `docker stop nombre_contenedor`    |
| `docker restart <contenedor>`              | Reinicia un contenedor en ejecución                               | `docker restart nombre_contenedor` |
| `docker rm <contenedor>`                   | Elimina un contenedor detenido                                    | `docker rm nombre_contenedor`      |
| `docker logs <contenedor>`                 | Muestra los logs de un contenedor                                 | `docker logs nombre_contenedor`    |
| `docker exec -it <contenedor> <comando>`   | Ejecuta un comando dentro de un contenedor en ejecución           | `docker exec -it nombre_contenedor bash` |
| `docker inspect <contenedor>`              | Muestra información detallada de un contenedor                    | `docker inspect nombre_contenedor` |

---

#### 3. **Gestión de Volúmenes**

| Comando                                    | Descripción                                                       | Ejemplo                            |
|--------------------------------------------|-------------------------------------------------------------------|------------------------------------|
| `docker volume create <nombre>`            | Crea un volumen                                                   | `docker volume create datos_vol`   |
| `docker volume ls`                         | Lista todos los volúmenes                                         | `docker volume ls`                 |
| `docker volume rm <nombre>`                | Elimina un volumen                                                | `docker volume rm datos_vol`       |
| `docker run -v <volumen>:<path>`           | Monta un volumen en un contenedor                                 | `docker run -v datos_vol:/data ubuntu` |

---

#### 4. **Gestión de Redes**

| Comando                                    | Descripción                                                       | Ejemplo                            |
|--------------------------------------------|-------------------------------------------------------------------|------------------------------------|
| `docker network ls`                        | Lista todas las redes disponibles                                 | `docker network ls`                |
| `docker network create <nombre>`           | Crea una nueva red                                                | `docker network create mi_red`     |
| `docker network rm <nombre>`               | Elimina una red                                                   | `docker network rm mi_red`         |
| `docker network inspect <nombre>`          | Muestra detalles sobre una red                                    | `docker network inspect mi_red`    |
| `docker run --network <nombre_red>`        | Conecta un contenedor a una red específica                        | `docker run --network mi_red nginx`|

---

#### 5. **Docker Compose**

Docker Compose permite gestionar aplicaciones multicontenedor utilizando un archivo YAML.

| Comando                                    | Descripción                                                       | Ejemplo                            |
|--------------------------------------------|-------------------------------------------------------------------|------------------------------------|
| `docker-compose up`                        | Levanta los servicios definidos en `docker-compose.yml`            | `docker-compose up`                |
| `docker-compose up -d`                     | Levanta los servicios en segundo plano                            | `docker-compose up -d`             |
| `docker-compose down`                      | Detiene y elimina todos los contenedores creados por Docker Compose| `docker-compose down`              |
| `docker-compose ps`                        | Lista los servicios en ejecución                                  | `docker-compose ps`                |
| `docker-compose logs`                      | Muestra los logs de los servicios gestionados por Docker Compose   | `docker-compose logs`              |

---

#### 6. **Gestión de Imágenes y Contenedores (limpieza)**

| Comando                                    | Descripción                                                       | Ejemplo                            |
|--------------------------------------------|-------------------------------------------------------------------|------------------------------------|
| `docker system prune`                      | Elimina contenedores, redes y volúmenes no utilizados              | `docker system prune`              |
| `docker rm $(docker ps -a -q)`             | Elimina todos los contenedores detenidos                          | `docker rm $(docker ps -a -q)`     |
| `docker rmi $(docker images -q)`           | Elimina todas las imágenes locales                                | `docker rmi $(docker images -q)`   |

---

#### 7. **Información del Sistema**

| Comando                                    | Descripción                                                       | Ejemplo                            |
|--------------------------------------------|-------------------------------------------------------------------|------------------------------------|
| `docker info`                              | Muestra información del sistema Docker                            | `docker info`                      |
| `docker version`                           | Muestra la versión de Docker instalada                            | `docker version`                   |

---

#### 8. **Control de Recursos**

| Comando                                    | Descripción                                                       | Ejemplo                            |
|--------------------------------------------|-------------------------------------------------------------------|------------------------------------|
| `docker stats`                             | Muestra el uso de recursos en tiempo real por contenedor          | `docker stats`                     |
| `docker top <contenedor>`                  | Muestra los procesos corriendo dentro de un contenedor            | `docker top nombre_contenedor`     |

---

#### 9. **Exportar e Importar Imágenes**

| Comando                                    | Descripción                                                       | Ejemplo                            |
|--------------------------------------------|-------------------------------------------------------------------|------------------------------------|
| `docker save -o <archivo.tar> <imagen>`    | Guarda una imagen como un archivo TAR                             | `docker save -o mi_imagen.tar ubuntu` |
| `docker load -i <archivo.tar>`             | Carga una imagen desde un archivo TAR                             | `docker load -i mi_imagen.tar`     |

---

#### 10. **Comandos Avanzados**

| Comando                                    | Descripción                                                       | Ejemplo                            |
|--------------------------------------------|-------------------------------------------------------------------|------------------------------------|
| `docker commit <contenedor> <nombre_imagen>`| Crea una nueva imagen desde un contenedor                         | `docker commit nombre_contenedor nueva_imagen`|
| `docker run --rm <imagen>`                 | Ejecuta un contenedor y lo elimina al detenerse                   | `docker run --rm ubuntu echo "hola"`|
| `docker attach <contenedor>`               | Conecta tu terminal a un contenedor en ejecución                  | `docker attach nombre_contenedor`  |

---

Este cheatsheet te proporciona una referencia rápida de los comandos más utilizados en Docker para gestionar imágenes, contenedores, volúmenes, redes y más. Familiarizándote con ellos, podrás optimizar tu flujo de trabajo con Docker y gestionar de forma eficiente tus aplicaciones en contenedores.
