<?php
//error_reporting(-1);
require_once 'function.php';
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

//если поля не пустые, то создаем массив с сессией 
$_SESSION['arr'][] = ['name'=> $name, 'masseg' => $message, 'check' => $checkbox];
$_SESSION['done_mass'] = 'Вы успешно отправили письмо';

//получаем все сообщения одного пользователя. 
$_SESSION['one_user'][$name][] = $message;

redirect();

/*вывести только имя и последнее сообщение, по клику на имени вывести на другой страничке
 все сообщения от этого имени, по клику на кнопке рядом с именем удалить имя и все сообщения от этого имени*/
?>
