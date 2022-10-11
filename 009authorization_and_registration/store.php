<?
require_once 'function.php';
session_start();

unset($_SESSION['error']);

$email = $_POST['email'];
$password = $_POST['password'];

//подкючаемся к БД
require_once 'connection.php';

//делаем запрос в БД и ищем емайл, который совпадает с емайл, введенным в форму
$sql = "SELECT * FROM `users_reg` WHERE email=:email";
$statment = $db->prepare($sql);
$statment->execute(['email' => $email]);
$result = $statment->fetch(PDO::FETCH_ASSOC);

//если result не путой, то выводим флешсообщение о том, что данная почта уже существует 
if(!empty($result)) {
  $_SESSION['error'] = 'Данная почта уже сушествует';
  header('Location: create.php');
  exit;
}

//проверяем что бы поле с email не было пустое
if(empty($email)) {
  $_SESSION['error'] = 'Введите почту';
  header('Location: create.php');
  exit; 
} 

//проверяем что бы поле с email не было пустое и содержало больше 3 символов
if(empty($password)) {
  $_SESSION['error'] = 'Введите пароль';
  header('Location: create.php');
  exit; 
}
if(mb_strlen($password)  <= 3) {
  $_SESSION['error'] = 'Пароль дольжен содержать больше 3 символов';
  header('Location: create.php');
  exit; 
}

//если дубликата пароля нет и все проверки пройдены, добавляем пользователя в БД
$sql = "INSERT INTO `users_reg` (`email`, `password`) VALUES (:email, :password)";
$statment = $db->prepare($sql);
$statment->execute(['email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)]);

$massage = 'Вы зарегистрировались, пройдите авторизацию что бы зайти в личный кабинет';
$_SESSION['success'] = $massage;

//перенаправляем на авторизацию
header('Location: auth.php');
exit;
?>