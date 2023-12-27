# Sintaxis Python

* Apuntes Python - Google Colab
[![Open In Colab](https://img.shields.io/badge/Colab-F9AB00?style=for-the-badge&logo=googlecolab&color=525252)](https://colab.research.google.com/drive/1FX6YlS98W5Wv6ArlIxsuTeKDqJkzwYym)
[![Huggingface](https://img.shields.io/badge/🤗%20-Spaces-yellow.svg?style=for-the-badge)]
[![Discord](https://img.shields.io/badge/RCP%20rucarpe-Discord-7289DA?style=for-the-badge&logo=discord&logoColor=white)]

## Comentarios
```Python
    #comentarios
```
## Variables
```Python
    nombre = ("Rubén CP")
    ciudad = ("Murcia")
```
## Función input
```Python
    nombre = input ("Nombre de usuario: ")
    print ("Nombre de usuario: ", nombre)
```

## Comprobar tipo de variable
```Python
    # isinstance
    print(isinstance(a, float))
```

## Strings
```Python
    #Comillas dobles
    print ("Hola")
    #Comillas simples
    print ('Hola')
    #Multilínea
    print ("""
        String multilínea
        Hola
            Adios
        Buenos días    
    """)

    a = "Hola"
    b = "¿Qué tal?"

    #Concatenar strings
    print (a + '' + b)
    #Función len() -> conocer la longitud del string
    print (len(a), len(b))
    #Recorrer valores del string
    print (a[0], a[1], a[2], a[3])
    #Solicitar valores entre un rango
    print (a[2:8]) ## Solicita todos los valores de una variable de entre la posición 2-8
    #Multiplicar el valor
    print (3*a)
    #Función .split separar
    print (variable.split(',')) #Ejemplo: Divide y crea una lista de todas las palabras o frases tras una ","
    #Función .join
    print (variable.join('#')) #Ejemplo: Junta todos los elementos que contiene la variable y sepáralos con #.
    #Función .replace
    print (b.replace('Hola','Hello'))

    # .capitalize()
    # .upper()
```

## Integers, floats y operadores

```Python
    #Mostrar tipo de dato
    print(type(1))
    #Forzar tipo de dato
    print(int('10')) #El usuario envía como cadena de texto y forzamos a interpretar el número
    print(float('10.1'))
```




## F strings
