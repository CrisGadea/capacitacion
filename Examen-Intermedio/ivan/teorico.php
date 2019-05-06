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
 * Modelo Vista Controlador (MVC) es un estilo de arquitectura de software que separa los datos de una aplicación, 
 * la interfaz de usuario, y la lógica de control en tres componentes distintos.
 *
 * En la cursada hicimos un modelo de Framework que consta de un Router, Controllers, Response, Request, Vistas donde 
 * vimos el funcionamiento y responsabilidades de cada uno.
 * 
 */
 
/**
 * 4 - Patrones de diseño. De un ejemplo practico de cada uno de Decorator y Composite.
 * Decorator : El patrón Decorator responde a la necesidad de añadir dinámicamente funcionalidades a un Objeto. 
 * Esto nos permite no tener que crear sucesivas clases que hereden de la primera incorporando la nueva funcionalidad,
 * sino otras que la implementan y se asocian a la primera. 
 * Hicimos un Decorator de billetera que estaba en medio de los llamados y las implementaciones de la clase billetera
 * agregandole algunas funcionalidades extras que la clase propia no posee.
 *  
 * Composite : El patrón de diseño Composite nos sirve para construir estructuras complejas partiendo de otras estructuras
 * mucho más simples, dicho de otra manera, podemos crear estructuras compuestas las cuales están conformadas por otras 
 * estructuras más pequeñas.
 * Implementamos éste modelo en un ejercicio de cajas que podían guardar objetos que podían ser otras caja u objetos 
 * unitarios. Cada caja sabía poner y sacar objetos de sí misma.
 *
 */