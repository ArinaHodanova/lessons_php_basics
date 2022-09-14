<?
session_start();

unset($_SESSION['error_user_name']);
unset($_SESSION['error_masseg']);
unset($_SESSION['warning']);
unset($_SESSION['done_mass']);

function redirect() {
  sleep(10);
  header('Location: index.php');
  exit;
}

//защищаем переменные от взлома 
$name = htmlspecialchars(trim($_POST['name']));
$masseg = htmlspecialchars(trim($_POST['masseg']));

//проверяем поля на заполненность, выводим предупреждение, если поля не заполнены
if(strlen($name) < 1 ) {
  $_SESSION['error_user_name'] = 'Заполните ваше имя';
} elseif(strlen($masseg) < 1) {
  $_SESSION['error_masseg'] = 'Сообщение не должно быть путым';
} else {
  $_SESSION['done_mass'] = 'Вы успешно отправили письмо';
}

//если поля не пустые, то создаем массив с сессией 
if(!empty($name) && !empty($masseg)) {
  if(!isset($_POST['checkbox'])) {
    $_POST['checkbox'] = 'off';
  } 
  $checkbox = $_POST['checkbox'];
  $_SESSION['arr'][] = ['name'=> $name, 'masseg' => $masseg, 'check' => $checkbox];
}

//получаем все сообщения одного пользователя. 
$_SESSION['one_user'][$name][] = $masseg;
?>
