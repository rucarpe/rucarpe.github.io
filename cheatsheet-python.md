### Cheatsheet de la Sintaxis de Python

Este cheatsheet cubre los conceptos esenciales de la sintaxis de Python para ayudarte a recordar y utilizar las características más importantes del lenguaje.

---

#### 1. **Comentarios**

- **Comentario de una línea:**
  ```python
  # Esto es un comentario
  ```

- **Comentario multilínea:**
  ```python
  """
  Esto es un comentario
  de múltiples líneas.
  """
  ```

---

#### 2. **Variables y Tipos de Datos**

- **Asignación de variables:**
  ```python
  x = 5
  nombre = "Python"
  ```

- **Tipos de datos básicos:**
  ```python
  entero = 10               # int
  decimal = 3.14            # float
  texto = "Hola"            # str
  booleano = True           # bool
  lista = [1, 2, 3]         # list
  tupla = (1, 2, 3)         # tuple
  diccionario = {"a": 1, "b": 2}  # dict
  conjunto = {1, 2, 3}      # set
  ```

- **Comprobar tipo de dato:**
  ```python
  type(x)  # Devuelve el tipo de la variable
  ```

---

#### 3. **Operadores**

- **Aritméticos:**
  ```python
  +  # Suma
  -  # Resta
  *  # Multiplicación
  /  # División
  // # División entera
  %  # Módulo (resto)
  ** # Exponenciación
  ```

- **Comparación:**
  ```python
  ==  # Igual a
  !=  # Distinto de
  >   # Mayor que
  <   # Menor que
  >=  # Mayor o igual que
  <=  # Menor o igual que
  ```

- **Lógicos:**
  ```python
  and  # Y lógico
  or   # O lógico
  not  # Negación lógica
  ```

- **Asignación combinada:**
  ```python
  x += 1  # Suma y asigna
  x -= 2  # Resta y asigna
  x *= 3  # Multiplica y asigna
  x /= 4  # Divide y asigna
  ```

---

#### 4. **Estructuras de Control**

- **Condicionales:**
  ```python
  if condicion:
      # Código si la condición es verdadera
  elif otra_condicion:
      # Código si la otra condición es verdadera
  else:
      # Código si ninguna de las condiciones es verdadera
  ```

- **Bucle `for`:**
  ```python
  for elemento in iterable:
      # Código a ejecutar en cada iteración
  ```

- **Bucle `while`:**
  ```python
  while condicion:
      # Código mientras la condición sea verdadera
  ```

- **Interrupción de bucles:**
  ```python
  break  # Salir del bucle
  continue  # Saltar a la siguiente iteración
  ```

---

#### 5. **Funciones**

- **Definir una función:**
  ```python
  def mi_funcion(parametro1, parametro2):
      # Código de la función
      return resultado
  ```

- **Llamar a una función:**
  ```python
  mi_funcion(arg1, arg2)
  ```

- **Funciones con valores por defecto:**
  ```python
  def mi_funcion(parametro1, parametro2="valor por defecto"):
      pass
  ```

- **Función lambda (función anónima):**
  ```python
  suma = lambda x, y: x + y
  ```

---

#### 6. **Listas**

- **Crear una lista:**
  ```python
  lista = [1, 2, 3, 4, 5]
  ```

- **Acceder a elementos:**
  ```python
  lista[0]  # Primer elemento
  lista[-1]  # Último elemento
  ```

- **Rebanar (slicing):**
  ```python
  lista[1:3]  # Sublista desde el índice 1 al 2
  lista[:3]   # Sublista desde el inicio hasta el índice 2
  lista[2:]   # Sublista desde el índice 2 hasta el final
  ```

- **Agregar elementos:**
  ```python
  lista.append(6)  # Añadir al final
  lista.insert(2, "nuevo")  # Insertar en una posición específica
  ```

- **Eliminar elementos:**
  ```python
  lista.remove(3)  # Elimina el primer valor que coincide
  lista.pop()  # Elimina y devuelve el último valor
  ```

---

#### 7. **Diccionarios**

- **Crear un diccionario:**
  ```python
  diccionario = {"clave1": "valor1", "clave2": "valor2"}
  ```

- **Acceder a valores:**
  ```python
  diccionario["clave1"]
  ```

- **Agregar o actualizar valores:**
  ```python
  diccionario["clave3"] = "valor3"
  ```

- **Eliminar un par clave-valor:**
  ```python
  del diccionario["clave1"]
  ```

- **Métodos útiles:**
  ```python
  diccionario.keys()  # Devuelve las claves
  diccionario.values()  # Devuelve los valores
  diccionario.items()  # Devuelve los pares clave-valor
  ```

---

#### 8. **Manejo de Archivos**

- **Abrir y leer un archivo:**
  ```python
  with open("archivo.txt", "r") as f:
      contenido = f.read()
  ```

- **Escribir en un archivo:**
  ```python
  with open("archivo.txt", "w") as f:
      f.write("Nuevo contenido")
  ```

---

#### 9. **Excepciones**

- **Capturar excepciones:**
  ```python
  try:
      # Código que puede generar una excepción
  except Exception as e:
      # Código a ejecutar si ocurre una excepción
      print(e)
  finally:
      # Código que se ejecuta siempre, ocurra o no una excepción
  ```

---

#### 10. **Clases y Objetos**

- **Definir una clase:**
  ```python
  class MiClase:
      def __init__(self, atributo):
          self.atributo = atributo
      
      def metodo(self):
          print(self.atributo)
  ```

- **Crear un objeto:**
  ```python
  obj = MiClase("valor")
  obj.metodo()  # Llamada a un método
  ```

---

#### 11. **Comprensiones (List/Dict/Set Comprehensions)**

- **Comprensión de listas:**
  ```python
  lista = [x**2 for x in range(10)]
  ```

- **Comprensión de diccionarios:**
  ```python
  diccionario = {x: x**2 for x in range(5)}
  ```

- **Comprensión de conjuntos:**
  ```python
  conjunto = {x for x in range(5)}
  ```

---

#### 12. **Importar Módulos**

- **Importar un módulo:**
  ```python
  import math
  ```

- **Importar una función específica:**
  ```python
  from math import sqrt
  ```

- **Renombrar un módulo al importarlo:**
  ```python
  import numpy as np
  ```

---

#### 13. **Operaciones con Fechas**

- **Obtener la fecha y hora actual:**
  ```python
  from datetime import datetime
  ahora = datetime.now()
  ```

- **Formatear una fecha:**
  ```python
  ahora.strftime("%Y-%m-%d %H:%M:%S")
  ```

---

#### 14. **Uso de Bibliotecas Externas**

- **Instalar una biblioteca externa:**
  ```bash
  pip install nombre_paquete
  ```

- **Ejemplo: Uso de `requests` para hacer una petición HTTP:**
  ```python
  import requests
  respuesta = requests.get("https://api.github.com")
  print(respuesta.status_code)
  ```

---

Este cheatsheet cubre los aspectos más importantes y esenciales de la sintaxis de Python. Con estos conceptos y comandos, podrás manejar eficientemente estructuras de control, funciones, clases, listas, diccionarios y mucho más en Python.
