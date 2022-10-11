<?
session_start();

//реализуем кнопку выхода на главной странице
if($_SESSION['user']['email'] == $_GET['exit']) {
  unset($_SESSION['user']);
  header('Location: index.php');
  exit;
}
?>