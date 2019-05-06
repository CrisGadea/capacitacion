<?php

/**
 * Se les presentan varias preguntas teoricas sobre los temas
 * vistos durante el curso. Responda con una X entre los [ ] en
 * las preguntas multiple choices y donde deba desarrollar escriba
 * dentro los comentarios.
 */

/**
 * 1 - MongoDB / Elastic search son:
 * 
 * [ ] - Base de datos relacionales
 * [X] - Base de datos no relacional
 * [ ] - Un sistema de documentos
 */

/**
 * 2 - MongoDB - Marque todas las que corresponda:
 * 
 * [ ] - Guarda documentos con una estructura rigida de información
 * [X] - Guarda documentos sin estructura rigida
 * [X] - Se puede guardar documentos en grupos de documentos o collecciones
 * [X] - Nos podemos comunicar con MongoDB por medio de JSON
 */

/**
 * 3 - Patrones de diseño. Explique MVC, de un ejemplo de las actividades donde
 *     hicimos uso de este patron. Comente los componentes principales
 *     de la actividad
 * 
 MVC(Modelo Vista Controlador): Es un estilo de arquitectura
 que separa datos de una aplicación,la interfaz de usuario y la logica de negocios.
 Se divide en tres capas:
 El Modelo que contiene una representación de los datos que maneja el sistema,
 su lógica de negocio, y sus mecanismos de persistencia.
 La Vista, o interfaz de usuario, que compone la información que se envía al cliente y los mecanismos interacción con éste.
 El Controlador, que actúa como intermediario entre el Modelo y la Vista, gestionando el flujo de información entre ellos
 y las transformaciones para adaptar los datos a las necesidades de cada uno.

 Utilizamos este patrón cuando creamos un framework, donde creamos controladores con diferentes tareas,
 dependiendo de qué tarea se trate, llamamos al controlador que corresponda.
 También generamos un router que se encarga de generar el mapeo de rutas y conexiones al controlador.

 */

 /**
  * 4 - Patrones de diseño. De un ejemplo practico de cada uno de Decorator y Composite.
  El patrón Decorator se encarga de añadir una funcionalidad a una clase sin modificarla de raíz,
  osea creando una entidad que se encargue de añadirle alguna funcionalidad a una clase recibida.
  Ejemplo: Tenemos una clase billetera en pesos y queremos saber cuánto vale su total pero en dolares,
  creamos un decorador billetera en dólares en donde vamos a recibir la billetera en pesos como parámetro
  en el constructor y le agregamos la funcionalidad de pasar a dólar y mostrar total en dólares.


  El patrón Composite sirve para construir objetos complejos a partir de otros más simples y similares entre sí.
  Esto simplifica el tratamiento de los objetos creados, ya que al poseer todos ellos una interfaz común, se tratan todos de la misma manera.
  Dependiendo de la implementación, pueden aplicarse procedimientos al total o una de las partes de la estructura compuesta
  como si de un nodo final se tratara, aunque dicha parte esté compuesta a su vez de muchas otras.
  Ejemplo: Tenemos una clase caja que puede guardar objetos adentro, incluyendo cajas del mismo tipo.
  */