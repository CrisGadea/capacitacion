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
 *   Modelo: logica de negocios. Clases y metodos que se comunican directamente con la base de datos.
 *   Vista: es la encargada de mostrarle la informacion al usuario
 *   Controlador: intermediario entre el modelo y la vista. Se encarga de las interacciones del usuario en la vista,
 *   pide los datos al modelo y los devuelve de nuevo a la vista para que esta los muestre el usuario. (clases, metodos y datos del formulario)
 * 
 *  Un ejemplo de MVC que aplicas es en Framework. Los aplicamos en las clases Router y en las clases Controller


 */
 
 /**
  * 4 - Patrones de diseño. De un ejemplo practico de cada uno de Decorator y Composite.
*   
*   El Decorator se la agrega una funcionalidad de una clase a otra clases sin cambiar las estructuras de las otras clases.

abstract class CarFeature implements Car {
  protected $car;

  function __construct(Car $car)
  {
    $this->car = $car;
  }


*   Composite es un patron de diseño componer objetos en una estructura ramificada y trabaja con ella como si fuera un objeto unico.
* 
  */