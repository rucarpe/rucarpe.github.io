### Cheatsheet de SQL

Este cheatsheet de SQL cubre los comandos más importantes y comunes para interactuar con bases de datos relacionales. Te ayudará a realizar tareas de consulta, manipulación de datos, definición de estructuras y control de accesos.

---

#### 1. **Creación y Gestión de Bases de Datos**

- **Crear una base de datos:**
  ```sql
  CREATE DATABASE nombre_base_datos;
  ```

- **Eliminar una base de datos:**
  ```sql
  DROP DATABASE nombre_base_datos;
  ```

- **Seleccionar una base de datos para usar:**
  ```sql
  USE nombre_base_datos;
  ```

---

#### 2. **Creación y Gestión de Tablas**

- **Crear una tabla:**
  ```sql
  CREATE TABLE nombre_tabla (
    id INT PRIMARY KEY,
    nombre VARCHAR(100),
    edad INT
  );
  ```

- **Eliminar una tabla:**
  ```sql
  DROP TABLE nombre_tabla;
  ```

- **Modificar una tabla (añadir columna):**
  ```sql
  ALTER TABLE nombre_tabla
  ADD direccion VARCHAR(255);
  ```

- **Modificar una tabla (eliminar columna):**
  ```sql
  ALTER TABLE nombre_tabla
  DROP COLUMN direccion;
  ```

- **Renombrar una tabla:**
  ```sql
  ALTER TABLE nombre_tabla
  RENAME TO nuevo_nombre_tabla;
  ```

---

#### 3. **Tipos de Datos Comunes**

| Tipo de Dato     | Descripción                                      |
|------------------|--------------------------------------------------|
| `INT`            | Números enteros                                  |
| `FLOAT`          | Números decimales                                |
| `VARCHAR(n)`     | Cadena de texto con longitud máxima `n`          |
| `DATE`           | Fecha en formato `YYYY-MM-DD`                    |
| `TIME`           | Hora en formato `HH:MM:SS`                       |
| `DATETIME`       | Fecha y hora combinadas                          |
| `BOOLEAN`        | Valores `TRUE` o `FALSE`                         |

---

#### 4. **Inserción de Datos**

- **Insertar un registro:**
  ```sql
  INSERT INTO nombre_tabla (id, nombre, edad) 
  VALUES (1, 'Juan', 25);
  ```

- **Insertar varios registros:**
  ```sql
  INSERT INTO nombre_tabla (id, nombre, edad)
  VALUES (2, 'Ana', 30), (3, 'Luis', 40);
  ```

---

#### 5. **Consulta de Datos (SELECT)**

- **Consultar todos los registros:**
  ```sql
  SELECT * FROM nombre_tabla;
  ```

- **Seleccionar columnas específicas:**
  ```sql
  SELECT nombre, edad FROM nombre_tabla;
  ```

- **Aplicar condiciones (WHERE):**
  ```sql
  SELECT * FROM nombre_tabla
  WHERE edad > 30;
  ```

- **Ordenar resultados (ORDER BY):**
  ```sql
  SELECT * FROM nombre_tabla
  ORDER BY edad DESC;
  ```

- **Limitar el número de resultados (LIMIT):**
  ```sql
  SELECT * FROM nombre_tabla
  LIMIT 5;
  ```

- **Renombrar columnas (AS):**
  ```sql
  SELECT nombre AS 'Nombre Completo', edad AS 'Años'
  FROM nombre_tabla;
  ```

---

#### 6. **Actualizar y Eliminar Datos**

- **Actualizar un registro:**
  ```sql
  UPDATE nombre_tabla
  SET edad = 26
  WHERE id = 1;
  ```

- **Actualizar múltiples columnas:**
  ```sql
  UPDATE nombre_tabla
  SET nombre = 'Juan Pérez', edad = 26
  WHERE id = 1;
  ```

- **Eliminar un registro:**
  ```sql
  DELETE FROM nombre_tabla
  WHERE id = 1;
  ```

---

#### 7. **Consultas Avanzadas**

- **Consulta con condiciones múltiples (AND/OR):**
  ```sql
  SELECT * FROM nombre_tabla
  WHERE edad > 25 AND nombre = 'Ana';
  ```

- **Consulta con comodines (LIKE):**
  ```sql
  SELECT * FROM nombre_tabla
  WHERE nombre LIKE 'A%';  -- Nombres que empiezan con "A"
  ```

- **Consulta con valores en un rango (BETWEEN):**
  ```sql
  SELECT * FROM nombre_tabla
  WHERE edad BETWEEN 25 AND 35;
  ```

- **Consulta con valores específicos (IN):**
  ```sql
  SELECT * FROM nombre_tabla
  WHERE edad IN (25, 30, 35);
  ```

---

#### 8. **Funciones de Agregación**

| Función            | Descripción                                      | Ejemplo                                     |
|--------------------|--------------------------------------------------|---------------------------------------------|
| `COUNT()`          | Cuenta el número de registros                    | `SELECT COUNT(*) FROM nombre_tabla;`        |
| `SUM()`            | Suma los valores de una columna                  | `SELECT SUM(edad) FROM nombre_tabla;`       |
| `AVG()`            | Calcula el promedio de los valores               | `SELECT AVG(edad) FROM nombre_tabla;`       |
| `MAX()`            | Devuelve el valor máximo                         | `SELECT MAX(edad) FROM nombre_tabla;`       |
| `MIN()`            | Devuelve el valor mínimo                         | `SELECT MIN(edad) FROM nombre_tabla;`       |

- **Consulta con agrupación (GROUP BY):**
  ```sql
  SELECT nombre, COUNT(*)
  FROM nombre_tabla
  GROUP BY nombre;
  ```

- **Consulta con filtrado después de la agrupación (HAVING):**
  ```sql
  SELECT nombre, COUNT(*)
  FROM nombre_tabla
  GROUP BY nombre
  HAVING COUNT(*) > 1;
  ```

---

#### 9. **Relaciones y Joins**

- **Inner Join:**
  ```sql
  SELECT a.nombre, b.departamento
  FROM empleados a
  INNER JOIN departamentos b
  ON a.departamento_id = b.id;
  ```

- **Left Join:**
  ```sql
  SELECT a.nombre, b.departamento
  FROM empleados a
  LEFT JOIN departamentos b
  ON a.departamento_id = b.id;
  ```

- **Right Join:**
  ```sql
  SELECT a.nombre, b.departamento
  FROM empleados a
  RIGHT JOIN departamentos b
  ON a.departamento_id = b.id;
  ```

- **Full Outer Join (si está disponible en el sistema):**
  ```sql
  SELECT a.nombre, b.departamento
  FROM empleados a
  FULL OUTER JOIN departamentos b
  ON a.departamento_id = b.id;
  ```

---

#### 10. **Índices**

- **Crear un índice:**
  ```sql
  CREATE INDEX idx_nombre
  ON nombre_tabla (nombre);
  ```

- **Eliminar un índice:**
  ```sql
  DROP INDEX idx_nombre;
  ```

---

#### 11. **Vistas**

- **Crear una vista:**
  ```sql
  CREATE VIEW vista_empleados AS
  SELECT nombre, edad
  FROM empleados
  WHERE edad > 30;
  ```

- **Eliminar una vista:**
  ```sql
  DROP VIEW vista_empleados;
  ```

---

#### 12. **Permisos y Usuarios**

- **Crear un usuario:**
  ```sql
  CREATE USER 'usuario'@'localhost' IDENTIFIED BY 'contraseña';
  ```

- **Otorgar permisos:**
  ```sql
  GRANT ALL PRIVILEGES ON nombre_base_datos.* TO 'usuario'@'localhost';
  ```

- **Revocar permisos:**
  ```sql
  REVOKE ALL PRIVILEGES ON nombre_base_datos.* FROM 'usuario'@'localhost';
  ```

- **Eliminar un usuario:**
  ```sql
  DROP USER 'usuario'@'localhost';
  ```

---

#### 13. **Transacciones**

- **Iniciar una transacción:**
  ```sql
  START TRANSACTION;
  ```

- **Confirmar una transacción (Commit):**
  ```sql
  COMMIT;
  ```

- **Deshacer una transacción (Rollback):**
  ```sql
  ROLLBACK;
  ```

---

### Resumen Final

Este cheatsheet cubre los comandos más importantes y comunes para trabajar con bases de datos SQL. Con estas consultas podrás gestionar tablas, manipular datos, realizar consultas avanzadas y gestionar usuarios en tus bases de datos SQL.
