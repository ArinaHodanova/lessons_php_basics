<?
session_start();

unset($_SESSION['error_user_name']);
unset($_SESSION['error_masseg']);
unset($_SESSION['warning']);
unset($_SESSION['done_mass']);

function redirect() {
  header('Location: index.php');
  exit;
}

//защищаем переменные от взлома 
$name = htmlspecialchars(trim($_POST['name']));
$masseg = htmlspecialchars(trim($_POST['masseg']));

//проверяем поля на заполненность, выводим предупреждение, если поля не заполнены
if(strlen($name) < 1) {
  $_SESSION['error_user_name'] = 'Заполните ваше имя';
} elseif(strlen($masseg) < 1) {
  $_SESSION['error_masseg'] = 'Сообщение недолжно быть путым';
} else {
  $_SESSION['done_mass'] = 'Вы успешно отправили письмо';
}

//добавляем ваность сообщения
if(!empty($_POST)) {
  if(!isset($_POST['checkbox'])) {
    $_POST['checkbox'] = 'off';
  } 
  $checkbox = $_POST['checkbox'];
  $_SESSION['arr'][] = ['name'=> $name, 'masseg' => $masseg, 'check' => $checkbox];
}

//добавлем в маccив имена пользователей 
$_SESSION['user_name'] = [];
foreach($_SESSION['arr'] as $elem) {
  if(!array_key_exists($$elem, $_SESSION['user_name'])) $_SESSION['user_name'][$elem['name']] = 0;
  $_SESSION['user_name'][$elem['name']]++;
}

foreach($_SESSION['user_name'] as $key => $elem) {
  echo $key . '<br>';
}
?>
