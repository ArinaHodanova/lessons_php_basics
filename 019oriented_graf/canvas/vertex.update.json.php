<?
//require_once dirname(__DIR__,1) . '/canvas/vertex.class.php';
require_once dirname(__DIR__,1) . '/websocket/ws.class.php';
$ws = new Websocket();
//var_dump($ws);
echo $ws->get_vertex();
?>
