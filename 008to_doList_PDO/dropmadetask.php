<?
require_once 'function.php';
session_start();

//удаляем сессию со списком выполненных дел
unset($_SESSION['made_task']);
redirect();
?>