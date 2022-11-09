<?
require_once 'functions.php';
$db = require_once 'DB/start.php';//подключаемся к БД

$db->create('posts', [
  'title' => $_POST['title']
]);

header('Location: index.php');
?>
