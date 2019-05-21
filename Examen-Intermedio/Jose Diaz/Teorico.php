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
 * [x ] - Base de datos no relacional
 * [ ] - Un sistema de documentos
 */
 
/**
 * 2 - MongoDB - Marque todas las que corresponda:
 *
 * [ ] - Guarda documentos con una estructura rigida de información
 * [ x] - Guarda documentos sin estructura rigida
 * [ x] - Se puede guardar documentos en grupos de documentos o collecciones
 * [ x] - Nos podemos comunicar con MongoDB por medio de JSON
 */
 
/**
 * 3 - Patrones de diseño. Explique MVC, de un ejemplo de las actividades donde
 *     hicimos uso de este patron. Comente los componentes principales
 *     de la actividad
 * 
 *    Modelo-vista-controlador (MVC) es un patrón de arquitectura de software, que separa los datos y la lógica de negocio 
 *    de una aplicación de su representación y el módulo encargado de gestionar los eventos y las comunicaciones. 
 *    Aplicamos controladores atraves de los llamados por la URL para que devolviera las letras correspondientes a la palabra designada
 *    en la clase Ahorcado.
 *    Se utilizaron las variables superglobales $_GET (Pasamos la informacion por la Url que luego aparece al ejecutar), $_POST
 *    y $_SESSION(Permite que se guarde la informacion pasada y no se borre por cada actualizacion)
 */
 
 /**
  * 4 - Patrones de diseño. De un ejemplo practico de cada uno de Decorator y Composite.

  En el patrón de Decorator, una clase agregará funcionalidad a otra clase, sin cambiar la estructura de las otras clases.

  class BookTitleDecorator {
    protected $book;
    protected $title;
    public function __construct(Book $book_in) {
        $this->book = $book_in;
        $this->resetTitle();
    }   

En el patrón compuesto, un objeto individual o un grupo de ese objeto tendrán comportamientos similares.
Sirve para encapsular una cosa dentro de otra, basicamente si el objeto que almacena desaparece tambien desaparecera su contenido.


        
  */