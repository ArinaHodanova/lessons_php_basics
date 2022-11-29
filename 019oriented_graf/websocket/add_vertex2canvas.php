<?
echo "testing send ";
require_once ("ws.class.php");
require_once "../canvas/graph.class.php";
$a = new Websocket();
$v = new graph("vertex",30,35);
if (4 == count($argv)) $v = new graph($argv[1],$argv[2],$argv[3]);
$a->send_vertex($v);
?>
