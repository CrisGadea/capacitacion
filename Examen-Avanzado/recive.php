<?php
require_once 'vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
//(ip,rabbitport,user,pass)--> Cambiar a IP: Dario
$connection = new AMQPStreamConnection('10.90.242.122', 10001, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('Cristian', false, false, false, false);

echo " [*] Waiting for messages. To exit press CTRL+C\n";
$callback = function ($msg) {
    echo ' [x] Received ', $msg->body, "\n";
};
$channel->basic_consume('Cristian', '', false, true, false, false, $callback);

while (count($channel->callbacks)) {
    $channel->wait();
}

