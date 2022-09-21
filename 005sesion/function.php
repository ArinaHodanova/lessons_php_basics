<?php
//error_reporting(-1);
session_start();

unset($_SESSION['error_user_name']);
unset($_SESSION['error_message']);
unset($_SESSION['warning']);
unset($_SESSION['done_mass']);

function redirect() {
  header('Location: index.php');
  exit;
}

//защищаем переменные от взлома 
$name = htmlspecialchars(trim($_POST['name']));
$message = htmlspecialchars(trim($_POST['message']));
$checkbox = $_POST['check'];

//проверяем на пустоту поля. Если поля пустые, то перекидывает опять на форму заполнения
if(iconv_strlen($name) < 2 || empty($name)) {
  $_SESSION['error_user_name'] = 'Заполните ваше имя';
  redirect();
}
if(iconv_strlen($message) < 1 || empty($message)) {
  $_SESSION['error_message'] = 'Сообщение не должно быть путым';
  redirect();
}

//если поля не пустые, то создаем массив с сессией 
$_SESSION['arr'][] = ['name'=> $name, 'masseg' => $message, 'check' => $checkbox];
$_SESSION['done_mass'] = 'Вы успешно отправили письмо';

//получаем все сообщения одного пользователя. 
$_SESSION['one_user'][$name][] = $message;

//если чекбокс активен
$_SESSION['check'] = $checkbox;
redirect();
?>
