<?
include  __DIR__ . '/class/connect.php';
$form_check = new Validator();

session_start();
$_SESSION['form_check'] = $form_check;


header('Location: index.php');
?>
