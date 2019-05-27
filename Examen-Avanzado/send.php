<?php
require_once 'vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
$connection = new AMQPStreamConnection('10.90.242.122', 10001, 'guest', 'guest');
$channel = $connection->channel();
$mensaje = ['mensaje'=>'Hola soy Cristian' , 'cola'=>'Cristian'];

$channel->queue_declare('encriptar', false, false, false, false);

$msg = new AMQPMessage(json_encode($mensaje));

$channel->basic_publish($msg, '', 'encriptar');

echo " [x] Sent 'Hola, soy Cristian'\n";

$channel->close();
$connection->close();