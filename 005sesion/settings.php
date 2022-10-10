<?php
//error_reporting(-1);
require_once 'function.php';
require_once 'class/userMessage.php';
session_start();

unset($_SESSION['error_user_name']);
unset($_SESSION['error_message']);
unset($_SESSION['warning']);
unset($_SESSION['done_mass']);

/*обработка входящей информации
  * Убираем лишние пробелы и теги. Имя должно идти с первой загланой буквы 
*/
$name = mb_convert_case(mb_strtolower(htmlspecialchars(trim($_POST['name'])), 'UTF-8'), MB_CASE_TITLE, "UTF-8");
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

//массив, который выводит кажно сообщения пользователя и его имя
//$_SESSION['arr'][] = ['name'=> $name, 'masseg' => $message, 'check' => $checkbox];
$_SESSION['done_mass'] = 'Вы успешно отправили письмо';
//получаем все сообщения одного пользователя. 
$_SESSION['one_user'][$name][] = $message;

/**
 * OOП
*/
$_SESSION['one_user_oop'][$name][] = new userMessage($name, $message);
foreach($_SESSION['one_user_oop'] as $key => $elem) {
  for($i = 0; $i < count($elem); $i++) {
    echo $elem[$i]->getMessages() . '<br>';
  }
}
//redirect();
?>
