<?
echo "hello";
/*
$address = 'localhost';
$port = 8001;
$server = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($server, $address, $port);
socket_listen($server);
$client = socket_accept($server);
 */
require_once ("ws.class.php");
$a = new Websocket();
$a->start();
?>
