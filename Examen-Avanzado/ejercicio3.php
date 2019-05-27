<?php

/**
 * Rabbitmq.
 * 
 * Tenemos un encriptador de mensajes para poder comunicarnos
 * con otras personas de forma segura. Para eso debemos mandar
 * el mensaje que queremos encriptar a rabbitmq diciendo el
 * mensaje a encriptar y a la cola donde quieren que se mande
 * el mensaje encriptado.
 * 
 * Deben postear en rabbitmq en el channel "encriptar" un
 * mensaje con dos campos:
 * array(
 *    'mensaje' => "MENSAJE A ENCRIPTAR",
 *    'cola' => "nombre de la cola a postear el resultado"
 * )
 * 
 * Una vez enviado el mensaje, deben leer la respuesta de su
 * mensaje en la cola que ustedes decidieron leer. Como
 * recomendación primero hagan el codigo que lee de la cola donde
 * esperan la respuesta y luego envien el mensaje. El ejercicio
 * se aprueba respondiendo que mensaje enviaron y cual fue la
 * respuesta.
 */

/**
 * instalar con composer la libreria de rabbitmq y agregar el
 * codigo aqui abajo.
 */