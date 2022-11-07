<?
$db = require_once 'DB/start.php';

//получаем все посты из БД
$posts = $db->getAll();

//выводим через foreach
require_once 'index.view.php';
?>
