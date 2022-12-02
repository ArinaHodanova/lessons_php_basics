<?
include  __DIR__ . '/class/connect.php';
session_start();
$_SESSION['validator'] = new Validator();
$_SESSION['validator']->check();
header('Location: index.php');
?>
