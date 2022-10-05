<?
require_once 'function.php';
require_once 'connect.php';
session_start();

$made_task = $_GET['made'];
$id_task = trim($_GET['id']);

//добаляем выбраные пункты в сессию 
$_SESSION['made_task'][] = $made_task;

//и удаляем пункт из БД
require_once 'delete.php';
redirect();
?>