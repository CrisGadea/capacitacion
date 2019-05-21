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
 * [x] - Base de datos no relacional
 * [ ] - Un sistema de documentos
 */
 
/**
 * 2 - MongoDB - Marque todas las que corresponda:
 *
 * [ ] - Guarda documentos con una estructura rigida de información
 * [x] - Guarda documentos sin estructura rigida
 * [x] - Se puede guardar documentos en grupos de documentos o collecciones
 * [x] - Nos podemos comunicar con MongoDB por medio de JSON
 */
 
/**
 * 3 - Patrones de diseño. Explique MVC, de un ejemplo de las actividades donde
 *     hicimos uso de este patron. Comente los componentes principales
 *     de la actividad
 * 
 * 
 * 
 * MVC significa modelo vista controlador, este patron de siseño se caracteriza por separar los datos y la lógica de negocio.
 * la vista seria la interfaz del usuario, esta parte la vimos poco en el curso
 * Modelo seria el router que se encarga de enrutar todos los pedidos que se hacen a los diferentes controladores, es quien une el controlador con la vista
 * Controlador es quien hace la logica, responde a las peticiones que se hagan 
 */
   
/**
  * 4 - Patrones de diseño. De un ejemplo practico de cada uno de Decorator y Composite.
  */Decorator:es un patron de diseño que se usa para modificar dinamicamente la funcion de algun metodo de clase, heredando de la primera clase 
  esta clase decorada se mete en el medio y cambia segun lo que se necesite el comportamiento de un metodo sin afectar el funcionamiento de la clase original

  Composite:este patron de diseño se utiliza para crear objetos complejos partiendo de otros mas simples, se caracteriza por su recursividad 
  