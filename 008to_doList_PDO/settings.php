<?
require_once 'function.php';
session_start();

//Удаляем сессию
unset($_SESSION['error']);
unset($_SESSION['done']);

$values_field = $_POST['task'];//получаем данные 

//Выводим предупреждение если поле пустое или содержит мало символов
if($values_field == '' ) {
  $_SESSION['error'] = 'Поле с заданием не должно быть пустым';
  redirect();
}
if(mb_strlen($values_field) < 4) {
  $_SESSION['error'] = 'Задание должно содержать больше 4 символов';
  redirect();
}

//подкллючение к БД
require_once 'connect.php';
$sql = 'INSERT INTO to_do(task) VALUES(:task)'; //
$query = $pdo->prepare($sql);
$query->execute(['task' => $values_field]);

$_SESSION['done'] = 'Задача добавлена';
redirect();
?>