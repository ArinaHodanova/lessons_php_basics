<?
require_once 'functions.php';
$db = require_once 'DB/start.php';//подключаемся к БД

$post = $db->getOne('posts', $_GET['id']);
?>

<h1>
  <?=$post['title']?>
</h1>
