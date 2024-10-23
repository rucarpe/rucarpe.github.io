### Cheatsheet de Git y GitHub (Con Explicaciones)

Git es un sistema de control de versiones distribuido, diseñado para gestionar proyectos de desarrollo y rastrear cambios en el código. **GitHub** es una plataforma que utiliza Git para alojar y colaborar en proyectos de software. Este cheatsheet no solo cubre los comandos, sino también explica qué son y por qué se usan los diferentes conceptos y comandos.

---

### 1. **Configuración Inicial de Git**

Cuando instalas Git, lo primero que necesitas hacer es configurar tu nombre de usuario y correo electrónico. Estos datos se usarán para identificar quién hizo los cambios en los commits.

- **Configurar el nombre de usuario:**
  ```bash
  git config --global user.name "Tu Nombre"
  ```
  **¿Por qué?** Esto le dice a Git qué nombre debe asociar con tus commits.

- **Configurar el correo electrónico:**
  ```bash
  git config --global user.email "tuemail@example.com"
  ```
  **¿Por qué?** El correo electrónico también se asocia a tus commits, y es necesario para que GitHub te identifique.

- **Ver la configuración actual:**
  ```bash
  git config --list
  ```
  **¿Por qué?** Este comando te permite verificar las configuraciones que has establecido, como tu nombre y correo electrónico.

---

### 2. **Crear y Gestionar Repositorios**

Un **repositorio** es un lugar donde se almacena tu proyecto. Puede ser local (en tu máquina) o remoto (en GitHub u otro servidor).

- **Crear un nuevo repositorio:**
  ```bash
  git init
  ```
  **¿Por qué?** `git init` convierte un directorio en un repositorio Git, permitiéndote rastrear cambios y versiones de tus archivos.

- **Clonar un repositorio existente:**
  ```bash
  git clone https://github.com/usuario/nombre-repositorio.git
  ```
  **¿Por qué?** `git clone` descarga un repositorio Git remoto y lo copia a tu máquina local. Esto es útil cuando quieres trabajar en un proyecto ya existente en GitHub.

- **Añadir un repositorio remoto:**
  ```bash
  git remote add origin https://github.com/usuario/nombre-repositorio.git
  ```
  **¿Por qué?** Esto le dice a Git dónde está ubicado el repositorio remoto en el cual deseas subir (push) tus cambios.

- **Ver repositorios remotos:**
  ```bash
  git remote -v
  ```
  **¿Por qué?** Te permite ver los enlaces de los repositorios remotos que tienes asociados con tu proyecto.

---

### 3. **Estados y Seguimiento de Archivos**

Git utiliza diferentes estados para los archivos: **untracked** (no seguidos), **staged** (preparados para el commit) y **committed** (confirmados en el historial).

- **Ver el estado de los archivos:**
  ```bash
  git status
  ```
  **¿Por qué?** Este comando te muestra qué archivos han cambiado, cuáles están preparados para el commit, y cuáles aún no están bajo seguimiento.

- **Añadir un archivo específico al área de preparación (staging):**
  ```bash
  git add nombre_archivo
  ```
  **¿Por qué?** `git add` añade los cambios de un archivo al área de preparación (staging), lo que indica que estás listo para confirmar (commit) esos cambios.

- **Añadir todos los archivos al área de preparación:**
  ```bash
  git add .
  ```
  **¿Por qué?** Añade todos los archivos modificados al área de preparación, ideal si tienes varios cambios que deseas confirmar en un solo commit.

- **Eliminar un archivo del área de preparación:**
  ```bash
  git reset nombre_archivo
  ```
  **¿Por qué?** Este comando deshace el `git add` y elimina el archivo del área de preparación, pero no elimina el archivo en sí.

---

### 4. **Commits**

Un **commit** es un punto en el historial del proyecto que captura el estado exacto de tus archivos en ese momento.

- **Crear un commit con un mensaje:**
  ```bash
  git commit -m "Mensaje del commit"
  ```
  **¿Por qué?** Un commit guarda los cambios en el repositorio con un mensaje descriptivo para que puedas recordar qué cambios se realizaron.

- **Combinar `add` y `commit` en un solo paso:**
  ```bash
  git commit -am "Mensaje del commit"
  ```
  **¿Por qué?** Este comando es un atajo para añadir y confirmar cambios en archivos que ya están siendo rastreados por Git.

- **Modificar el último commit (sin cambiar el mensaje):**
  ```bash
  git commit --amend
  ```
  **¿Por qué?** Si te olvidaste de añadir un archivo o cometiste un error en el commit anterior, puedes corregirlo sin crear uno nuevo.

- **Modificar el último commit (y cambiar el mensaje):**
  ```bash
  git commit --amend -m "Nuevo mensaje"
  ```
  **¿Por qué?** Esto te permite cambiar el mensaje de un commit ya realizado.

---

### 5. **Historial y Diferencias**

Git rastrea todo el historial de cambios realizados en el proyecto.

- **Ver el historial de commits:**
  ```bash
  git log
  ```
  **¿Por qué?** Muestra una lista de todos los commits realizados, con detalles como el autor, fecha y mensaje del commit.

- **Ver un historial compacto:**
  ```bash
  git log --oneline
  ```
  **¿Por qué?** Esta opción muestra el historial de commits de manera más concisa, útil cuando quieres una vista rápida de los cambios.

- **Ver las diferencias entre archivos no confirmados (unstaged):**
  ```bash
  git diff
  ```
  **¿Por qué?** Muestra las diferencias entre el archivo actual y su última versión confirmada (commit).

- **Ver diferencias entre los archivos preparados (staged):**
  ```bash
  git diff --staged
  ```
  **¿Por qué?** Compara los cambios que están en el área de preparación con el último commit.

---

### 6. **Trabajo con Ramas (Branches)**

Las **ramas** permiten trabajar en diferentes versiones del proyecto al mismo tiempo, sin afectar la rama principal.

- **Crear una nueva rama:**
  ```bash
  git branch nombre_rama
  ```
  **¿Por qué?** Crear una rama te permite trabajar en una nueva funcionalidad o corrección de errores sin interferir con el código en la rama principal.

- **Cambiar de rama:**
  ```bash
  git checkout nombre_rama
  ```
  **¿Por qué?** Te permite cambiar el contexto de trabajo a una rama diferente.

- **Crear y cambiar a una nueva rama:**
  ```bash
  git checkout -b nombre_rama
  ```
  **¿Por qué?** Este comando crea una nueva rama y cambia a ella en un solo paso.

- **Listar todas las ramas:**
  ```bash
  git branch
  ```
  **¿Por qué?** Muestra todas las ramas en tu repositorio, indicándote en cuál estás actualmente.

- **Eliminar una rama local:**
  ```bash
  git branch -d nombre_rama
  ```
  **¿Por qué?** Elimina una rama local que ya no necesitas, generalmente después de haber fusionado los cambios.

- **Unir una rama con la actual (merge):**
  ```bash
  git merge nombre_rama
  ```
  **¿Por qué?** `git merge` integra los cambios de otra rama en la rama actual, combinando el trabajo realizado.

---

### 7. **Sincronización con GitHub**

Una vez que has hecho cambios localmente, puedes sincronizarlos con tu repositorio remoto en GitHub.

- **Subir cambios al repositorio remoto:**
  ```bash
  git push origin nombre_rama
  ```
  **¿Por qué?** Sube los commits locales a GitHub, actualizando el repositorio remoto con tus cambios.

- **Obtener los últimos cambios del repositorio remoto:**
  ```bash
  git pull origin nombre_rama
  ```
  **¿Por qué?** Descarga y aplica los últimos cambios realizados en GitHub al repositorio local.

- **Forzar un push (sobreescribe los cambios remotos, usa con cuidado):**
  ```bash
  git push --force
  ```
  **¿Por qué?** Se usa cuando necesitas sobrescribir el historial remoto, pero puede ser peligroso ya que puede eliminar el trabajo de otros.

---

### 8. **Revertir Cambios**

Si cometes un error, Git te permite revertir o deshacer cambios de manera segura.

- **Descartar cambios no confirmados en un archivo:**
  ```bash
  git checkout -- nombre_archivo
  ```
  **¿Por qué?** Revierte los cambios locales en un archivo específico, volviendo a su versión más reciente confirmada.

- **Revertir un commit (sin eliminarlo del historial):**
  ```bash
  git revert nombre_commit
  ```
  **¿Por qué?** Crea un nuevo commit que deshace los cambios de un commit anterior, sin eliminarlo del historial.

- **Restaurar un commit anterior (peligroso, manipula el historial):**
  ```bash
  git reset --hard nombre_commit
  ```
  **¿Por qué?** Este comando resetea

 el estado del proyecto a un commit anterior, eliminando todos los cambios posteriores.

- **Descartar todos los cambios no confirmados:**
  ```bash
  git reset --hard
  ```
  **¿Por qué?** Este comando deshace todos los cambios no confirmados, útil si deseas volver al último commit sin mantener ninguno de los cambios locales.

---

### 9. **Stash (Almacenar Cambios Temporalmente)**

El **stash** te permite guardar cambios temporalmente sin hacer un commit, para que puedas cambiar de rama o realizar otras tareas sin perder tu trabajo.

- **Guardar cambios temporalmente (stash):**
  ```bash
  git stash
  ```
  **¿Por qué?** Si necesitas cambiar de rama o resolver algo urgentemente, puedes guardar tus cambios locales sin confirmarlos.

- **Ver las entradas guardadas en el stash:**
  ```bash
  git stash list
  ```
  **¿Por qué?** Muestra una lista de los cambios que has almacenado temporalmente.

- **Aplicar los cambios guardados (último stash):**
  ```bash
  git stash apply
  ```
  **¿Por qué?** Recupera los cambios guardados en el stash para aplicarlos de nuevo en tu rama actual.

---

### 10. **Etiquetas (Tags)**

Las **etiquetas** (tags) se utilizan para marcar versiones específicas del proyecto, como lanzamientos de versiones de software.

- **Crear una etiqueta (tag) anotada:**
  ```bash
  git tag -a v1.0 -m "Versión 1.0"
  ```
  **¿Por qué?** Las etiquetas permiten señalar puntos importantes en la historia del proyecto, como el lanzamiento de una versión.

- **Ver todas las etiquetas:**
  ```bash
  git tag
  ```
  **¿Por qué?** Muestra una lista de todas las etiquetas en el repositorio.

- **Subir una etiqueta a GitHub:**
  ```bash
  git push origin v1.0
  ```
  **¿Por qué?** Sube la etiqueta creada al repositorio remoto.

---

### 11. **Forks y Pull Requests (GitHub)**

**Forkear** un repositorio significa crear una copia del mismo bajo tu cuenta de GitHub. Esto es útil cuando quieres contribuir a un proyecto que no te pertenece.

- **Forkear un repositorio:**
  - Ve a la página del repositorio en GitHub y haz clic en el botón **Fork**.
  
  **¿Por qué?** Forkear crea una copia independiente del repositorio en tu cuenta. Puedes hacer cambios sin afectar el proyecto original.

- **Clonar tu fork:**
  ```bash
  git clone https://github.com/tu_usuario/nombre-repositorio-forkeado.git
  ```
  **¿Por qué?** Esto clona tu copia del repositorio (fork) a tu máquina local.

- **Crear un Pull Request (PR) en GitHub:**
  - Después de hacer cambios y subirlos a tu fork, ve al repositorio original en GitHub y haz clic en **New Pull Request** para solicitar que se integren tus cambios.
  
  **¿Por qué?** Un Pull Request es una solicitud para que los propietarios del repositorio original revisen e integren tus cambios.

---

### 12. **Git Ignore**

El archivo `.gitignore` se utiliza para decirle a Git qué archivos o directorios no deben ser rastreados ni subidos al repositorio.

- **Ejemplo de `.gitignore`:**
  ```plaintext
  # Ignorar archivos binarios
  *.exe
  *.dll

  # Ignorar la carpeta temporal
  /tmp/

  # Ignorar configuraciones de IDE
  .vscode/
  .idea/
  ```

  **¿Por qué?** Ayuda a evitar que archivos innecesarios (como configuraciones locales, archivos temporales o binarios) se incluyan en el repositorio.

---

### 13. **Colaboración en Equipos (Remotes)**

Cuando colaboras en un proyecto, puede que desees sincronizar tu repositorio con el repositorio original (upstream).

- **Agregar un repositorio remoto adicional:**
  ```bash
  git remote add upstream https://github.com/usuario-original/nombre-repositorio.git
  ```
  **¿Por qué?** Te permite sincronizar tu fork con el repositorio original, asegurándote de trabajar con la última versión del código.

- **Obtener cambios del repositorio original (upstream):**
  ```bash
  git fetch upstream
  ```
  **¿Por qué?** Descarga los cambios recientes del repositorio original sin aplicarlos todavía.

- **Fusionar cambios del upstream a tu rama:**
  ```bash
  git merge upstream/main
  ```
  **¿Por qué?** Esto aplica los cambios más recientes del repositorio original a tu rama actual.

---

### 14. **Buenas Prácticas**

- **Hacer commits frecuentes y con mensajes claros.** 
  - Te permite mantener un historial detallado y comprensible de los cambios.

- **Usar ramas para desarrollar nuevas funcionalidades o corregir errores.** 
  - Aísla el trabajo en curso del código estable.

- **Hacer `pull` antes de `push` para evitar conflictos.** 
  - Asegura que estás trabajando con la versión más reciente del código.

- **No hacer `push --force` a menos que sea absolutamente necesario.** 
  - Este comando puede sobrescribir los cambios de otros colaboradores, lo que es potencialmente peligroso.

---

### Resumen Final

Este cheatsheet no solo te proporciona una referencia rápida de los comandos más importantes de **Git** y **GitHub**, sino que también te explica los conceptos y el contexto detrás de ellos. Con este conocimiento, estarás mejor preparado para gestionar tu código, colaborar en proyectos y mantener un historial limpio y organizado de tu trabajo.
