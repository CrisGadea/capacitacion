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
 */

 ######RESPUESTA:
/*
El MVC es un patron de diseño que utiliza tres componentes: modelo, vista y controlador.
Sirve para separar la lógica de la vista en la aplicación. El modelo se encarga de los datos, el controlador recibe las ordenes del usuario, le pide los datos al modelo y se los pasa a la vista. Y la vista es la interfaz gráfica de la aplicación.
Usamos este patrón en el desarrollo de nuestro propio framework.

*/
 
 
 /**
  * 4 - Patrones de diseño. De un ejemplo practico de cada uno de Decorator y Composite.
  */
  ######RESPUESTA:
/*Decorator: 
    El Decorator es una patron de diseño que consiste en crear una clase que se 'mete' entre otras dos y busca realizar una acción sin modificar el comportamiento de la clase a la cual 'decora'. Por ejemplo se usa un Decorator para realizar estadisticas sobre una clase que registra ventas de un producto.

    Composite: El composite es un patrón que se usa para crear estructuras compuestas por otras estructuras mas chicas.
    Esto hace mas fácil el uso de los objetos instanciados, ya que todos tienen una interfaz comúnentonces se usan  todos de la misma forma. Un ejemplo de apliacación de este patrón sería el Explorador de windows, donde tenemos carpetas compuestas por otras carpetas de forma recursiva.
*/