<?
echo "adding vertex to canvas ".PHP_EOL;
require_once __DIR__ . "/ws.class.php";
require_once dirname(__DIR__,1) . "/canvas/vertex.class.php";
$a = new Websocket();
$v = new vertex("vertex",30,35);
if (4 == count($argv)) $v = new vertex($argv[1],$argv[2],$argv[3]);
$a->send_vertex($v);
?>
