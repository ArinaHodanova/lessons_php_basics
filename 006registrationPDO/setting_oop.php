<?
include  __DIR__ . '/class/connect.php';
$_SESSION['form_check'] = new Validator();
session_start();

header('Location: index.php');
?>
