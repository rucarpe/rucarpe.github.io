### Cheatsheet de Comandos Básicos para la Terminal en Linux y MacOS

Este cheatsheet cubre los comandos más útiles y comunes que puedes usar en la terminal de **Linux** y **MacOS**. Estos comandos son esenciales para la gestión de archivos, navegación por el sistema, redes, procesos y más.

---

#### 1. **Navegación y Gestión de Archivos**

| Comando                      | Descripción                                               | Ejemplo                        |
|------------------------------|-----------------------------------------------------------|--------------------------------|
| `pwd`                         | Muestra el directorio actual                              | `pwd`                          |
| `ls`                          | Lista los archivos y directorios                          | `ls -l`                        |
| `cd <directorio>`             | Cambia al directorio especificado                         | `cd /home/user`                |
| `mkdir <nombre>`              | Crea un nuevo directorio                                  | `mkdir proyectos`              |
| `rmdir <directorio>`          | Elimina un directorio vacío                               | `rmdir proyectos`              |
| `rm <archivo>`                | Elimina un archivo                                        | `rm archivo.txt`               |
| `rm -r <directorio>`          | Elimina un directorio y su contenido                      | `rm -r proyectos`              |
| `cp <origen> <destino>`       | Copia un archivo o directorio                             | `cp archivo.txt /tmp/`         |
| `mv <origen> <destino>`       | Mueve o renombra un archivo o directorio                  | `mv archivo.txt documentos/`   |
| `touch <archivo>`             | Crea un archivo vacío o actualiza la fecha de modificación| `touch nuevo_archivo.txt`      |
| `cat <archivo>`               | Muestra el contenido de un archivo                        | `cat archivo.txt`              |
| `nano <archivo>`              | Abre un archivo en el editor de texto Nano                | `nano archivo.txt`             |

---

#### 2. **Permisos y Propietarios**

| Comando                      | Descripción                                               | Ejemplo                        |
|------------------------------|-----------------------------------------------------------|--------------------------------|
| `chmod <permisos> <archivo>`  | Cambia los permisos de un archivo                         | `chmod 755 script.sh`          |
| `chown <usuario> <archivo>`   | Cambia el propietario de un archivo o directorio          | `chown user archivo.txt`       |
| `chgrp <grupo> <archivo>`     | Cambia el grupo de un archivo o directorio                | `chgrp staff archivo.txt`      |

---

#### 3. **Redes**

| Comando                      | Descripción                                               | Ejemplo                        |
|------------------------------|-----------------------------------------------------------|--------------------------------|
| `ping <host>`                 | Envía paquetes para comprobar la conectividad             | `ping google.com`              |
| `ifconfig` / `ip a`           | Muestra la configuración de red (Linux usa `ip`)          | `ifconfig` / `ip a`            |
| `curl <URL>`                  | Realiza peticiones HTTP/HTTPS                             | `curl https://www.google.com`  |
| `wget <URL>`                  | Descarga archivos desde la web                            | `wget https://archivo.com/file`|
| `scp <origen> <destino>`      | Copia archivos entre máquinas de forma segura             | `scp file.txt user@host:/tmp/` |
| `ssh <usuario>@<host>`        | Inicia sesión en una máquina remota                       | `ssh user@192.168.1.100`       |
| `netstat -tuln`               | Muestra los puertos en escucha y las conexiones activas    | `netstat -tuln`                |

---

#### 4. **Procesos**

| Comando                      | Descripción                                               | Ejemplo                        |
|------------------------------|-----------------------------------------------------------|--------------------------------|
| `ps aux`                      | Muestra todos los procesos en ejecución                   | `ps aux`                       |
| `top`                         | Muestra los procesos activos en tiempo real               | `top`                          |
| `htop`                        | Similar a `top` pero más interactivo (requiere instalación)| `htop`                         |
| `kill <PID>`                  | Termina un proceso por su ID (PID)                        | `kill 1234`                    |
| `killall <nombre>`            | Termina todos los procesos con el nombre dado             | `killall firefox`              |
| `bg`                          | Reanuda un proceso suspendido en segundo plano            | `bg`                           |
| `fg`                          | Trae un proceso suspendido al primer plano                | `fg`                           |
| `jobs`                        | Lista los procesos en segundo plano                       | `jobs`                         |

---

#### 5. **Gestión de Usuarios**

| Comando                      | Descripción                                               | Ejemplo                        |
|------------------------------|-----------------------------------------------------------|--------------------------------|
| `whoami`                      | Muestra el usuario actual                                 | `whoami`                       |
| `sudo <comando>`              | Ejecuta un comando como superusuario                      | `sudo apt-get update`          |
| `adduser <nombre>`            | Añade un nuevo usuario                                    | `sudo adduser nuevo_usuario`   |
| `passwd <usuario>`            | Cambia la contraseña de un usuario                        | `sudo passwd nombre_usuario`   |
| `usermod -aG <grupo> <usuario>`| Añade un usuario a un grupo                               | `sudo usermod -aG sudo user`   |
| `deluser <usuario>`           | Elimina un usuario                                        | `sudo deluser usuario`         |

---

#### 6. **Búsqueda de Archivos**

| Comando                      | Descripción                                               | Ejemplo                        |
|------------------------------|-----------------------------------------------------------|--------------------------------|
| `find <ruta> -name <archivo>` | Busca archivos o directorios por nombre                   | `find /home -name archivo.txt` |
| `grep <texto> <archivo>`      | Busca un texto específico dentro de un archivo            | `grep "error" log.txt`         |
| `locate <archivo>`            | Busca un archivo rápidamente usando la base de datos de ubicaciones | `locate archivo.txt`     |

---

#### 7. **Compresión y Archivos**

| Comando                      | Descripción                                               | Ejemplo                        |
|------------------------------|-----------------------------------------------------------|--------------------------------|
| `tar -cvf <archivo.tar> <directorio>`| Crea un archivo tar comprimido                    | `tar -cvf backup.tar /proyecto`|
| `tar -xvf <archivo.tar>`      | Extrae un archivo tar                                     | `tar -xvf backup.tar`          |
| `zip <archivo.zip> <archivo>` | Comprime un archivo en formato zip                        | `zip archivo.zip file.txt`     |
| `unzip <archivo.zip>`         | Extrae archivos de un archivo zip                         | `unzip archivo.zip`            |

---

#### 8. **Sistema y Monitoreo**

| Comando                      | Descripción                                               | Ejemplo                        |
|------------------------------|-----------------------------------------------------------|--------------------------------|
| `df -h`                       | Muestra el uso de disco con unidades legibles             | `df -h`                        |
| `du -sh <directorio>`         | Muestra el tamaño de un directorio                        | `du -sh /home`                 |
| `uptime`                      | Muestra el tiempo que lleva encendido el sistema          | `uptime`                       |
| `free -h`                     | Muestra el uso de memoria                                 | `free -h`                      |
| `uname -a`                    | Muestra información sobre el kernel y el sistema operativo| `uname -a`                     |

---

#### 9. **Gestión de Paquetes**

##### **Linux (Debian/Ubuntu)**

| Comando                      | Descripción                                               | Ejemplo                        |
|------------------------------|-----------------------------------------------------------|--------------------------------|
| `apt-get update`              | Actualiza los repositorios de paquetes                    | `sudo apt-get update`          |
| `apt-get upgrade`             | Actualiza los paquetes instalados                         | `sudo apt-get upgrade`         |
| `apt-get install <paquete>`   | Instala un paquete                                        | `sudo apt-get install htop`    |
| `apt-get remove <paquete>`    | Elimina un paquete                                        | `sudo apt-get remove htop`     |

##### **MacOS (Homebrew)**

| Comando                      | Descripción                                               | Ejemplo                        |
|------------------------------|-----------------------------------------------------------|--------------------------------|
| `brew update`                 | Actualiza los repositorios de Homebrew                    | `brew update`                  |
| `brew upgrade`                | Actualiza los paquetes instalados                         | `brew upgrade`                 |
| `brew install <paquete>`      | Instala un paquete                                        | `brew install wget`            |
| `brew remove <paquete>`       | Elimina un paquete instalado                              | `brew remove wget`             |

---

#### 10. **Atajos de Teclado Útiles**

| Combinación                   | Descripción                                               |
|-------------------------------|-----------------------------------------------------------|
| `Ctrl + C`                    | Detiene el proceso en ejecución                           |
| `Ctrl + Z`                    | Suspende el proceso en ejecución                          |
| `Ctrl + D`                    | Cierra la terminal o termina la sesión actual             |
| `Ctrl + A`                    | Mueve el cursor al inicio de la línea                     |
| `Ctrl + E`                    | Mueve el cursor al final de la línea                      |
| `Ctrl + R`                   

 | Busca un comando anterior en el historial                 |

---

Este cheatsheet te permitirá moverte con agilidad en la terminal, realizar tareas administrativas, gestionar archivos y supervisar tu sistema. Con el tiempo, dominarás estos comandos y podrás personalizar tu flujo de trabajo en la línea de comandos.
