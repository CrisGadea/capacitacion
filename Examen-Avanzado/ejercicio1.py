"""

Tendremos una lista de numeros donde nos interesa contar
solamente los numeros impares pero usando threads. La idea
es tener 5 threads que cuenten de forma independiente numeros
impares y que al final imprimamos el total de numeros impares.

"""
import random

numeros = [random.randint(1, 100) for _ in range(100)]

class ContadorDeImpares:
    pass