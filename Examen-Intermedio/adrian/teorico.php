
<?php
  //Adrian Matute
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
 * [ x] - Base de datos no relacional
 * [ ] - Un sistema de documentos
 */
 
/**
 * 2 - MongoDB - Marque todas las que corresponda:
 *
 * [ ] - Guarda documentos con una estructura rigida de información
 * [x ] - Guarda documentos sin estructura rigida
 * [ x] - Se puede guardar documentos en grupos de documentos o collecciones
 * [x ] - Nos podemos comunicar con MongoDB por medio de JSON
 */
 
/**
 * 3 - Patrones de diseño. Explique MVC, de un ejemplo de las actividades donde
 *     hicimos uso de este patron. Comente los componentes principales
 *     de la actividad
 */
      Es cuando se separa los datos de la logica del programa y la manera como se ve
      la informacion.
      Haciamos llamado desde una url a un controlador que guardaba cierta informacion.
      Teniamos un router que guardaba las url y los controladores, un controlador
      que instanciaba clases y le daba a esa clase todo lo necesario para existir.
      
      La informacion de la url la recogiamos a traves de la superglobal $_GET['url'],
      y haciamos guardado de la informacion de cada sesion a traves de la superglobal
      $_SESSION['url'], si teniamos formularios lo haciamos a traves del metodo post,
      si usabamos la superglobal $_POST['name...etc'], enviabamos info a traves de un
      medio que no es visible para otros, "mas seguro", esta se usa para enviar claves y 
      contraseñas.
       
      La actividad desarrollada consistia en un array de controladores que dependiendo,
      de la url enviada por get nos instanciaba una clase que a su vez nos devolvia informacion
      que solicitabamos, en mi caso tiempo, nombres, apellidos, etc.
      Tambien realice el ahorcado donde enviaba letras a traves de la url, y me decia cuando
      perdia, cuantos intentos restantes me quedaban y cuando ganaba.
 /**
  * 4 - Patrones de diseño. De un ejemplo practico de cada uno de Decorator y Composite.
  */

     DECORATOR: Se comporta exactamente como la clase a decorar, solo se mete en medio
     y agregar ciertas funcionalidades, donde podemos generar estadisticas sobre un 
    hecho que controla la clase en cuestion.
     Ejemplo: si gestionamos una plataforma de suscripcion podemos identificar informacion
     sobre el tipo de usuarios soliciten cual tipo de pelicula, y de esa manera podriamos
     conocer que le guste a que sector de nuestros suscriptores y enviar campañas publicitarias
     mas personalizadas.

     Composite: a traves de una estructura simple de clase, podriamos generar relaciones mas 
     complejas.
     Ejemplo: Podriamos crear una clase empresa, la cual tiene una estructura natural de empresa,
     y que reciba otra empresa dentro de si misma, que podria ser una empresa de limpieza,
     y esa misma empresa podria estar dentro de otra empresa y asi sucesivamente hasta tener una rama 
de empresas que se conectan entre si y una esta dentro de la otra.
