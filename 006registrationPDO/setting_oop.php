<?
session_start();
include  __DIR__ . '/class/connect.php';
$form_check = new Validator();

$_SESSION['form_check'] = $form_check;

header('Location: index.php');
?>
