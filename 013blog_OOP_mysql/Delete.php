<?
require_once 'functions.php';
$db = require_once 'DB/start.php';//подключаемся к БД

$db->delete('posts', $_GET['id']);
header('Location: index.php');
?>
