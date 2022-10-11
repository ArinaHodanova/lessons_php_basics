<?
session_start();
require_once 'function.php';
//аторизация

$email = $_POST['email'];
$password = $_POST['password'];

//проверяем поля на пустоту
if(empty($email)) {
  $_SESSION['error'] = 'Заполните почту';
  header('Location: auth.php');
  exit;
}
if(empty($password)) {
  $_SESSION['error'] = 'Заполните пароль';
  header('Location: auth.php');
  exit;
}

//подкючаемся к БД
require_once 'connection.php';
//проверяем совпадает ли почта из БД с почтой и формы
$sql = "SELECT * FROM `users_reg` WHERE email=:email";
$stat = $db->prepare($sql);
$stat->execute(['email' => $email]);
$user = $stat->fetch(PDO::FETCH_ASSOC);

//если почта не найдена выводим предупреждение, что нужно пройти регистрацию
if(empty($user)) {
  $_SESSION['error_registr'] = 'Такой почты нет. Нужно пройти регистрацию';
  header('Location: auth.php');
  exit;
}

//проверяем совпадает ли пароль, с введенным паролем
if(!password_verify($password, $user['password'])) {
  $_SESSION['error'] = 'Вы ввели не верный пароль';
  header('Location: auth.php');
  exit;
}

//записываем пользователя в сессию - аутентификация
$_SESSION['user'] = [
  'id' => $user['id'],
  'email' => $user['email'],
  'password' => $password
];

//если пользователь прошел авторизацию 
if(!empty($_SESSION['user'])) {
  header('Location: personal_office.php');
  exit;
}

redirect();
?>