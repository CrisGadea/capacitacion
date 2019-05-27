"""

Tendremos una lista de numeros donde nos interesa contar
solamente los numeros impares pero usando threads. La idea
es tener 5 threads que cuenten de forma independiente numeros
impares y que al final imprimamos el total de numeros impares.

"""
import random
import threading
import time

lista = [random.randint(1, 100) for _ in range(100)]

#class ContadorDeImpares:
  
class MiHilo(threading.Thread):
    def __init__(self,inicio,fin,lista):
        super().__init__()  #hereda el constructor del padre
        self.inicio = inicio
        self.fin = fin
        self.lista = lista
        self.total = 0

    #metodo que hay que sobreescribir de la clase threading
    def run(self):
        for n in range(self.inicio,self.fin+1):
            if lista[n]%2 is not 0:
                self.total+= self.lista[n]
                time.sleep(1.0/100.0) #para que tarde un poquito

    def dameTotal(self):
        return self.total

procesos=[]
procesos.append(MiHilo(0,19,lista))
procesos.append(MiHilo(20,39,lista))
procesos.append(MiHilo(40,59,lista))
procesos.append(MiHilo(60,79,lista))
procesos.append(MiHilo(80,99,lista))

for proceso in procesos:
    proceso.start()   #te ejecuta el RUN automaticamente


for proceso in procesos:
    proceso.join()

resultado = 0
for proceso in procesos:
    proceso.join()    #espera hasta que termina el RUN
    resultado += proceso.dameTotal()

print("El resultado es:",resultado)