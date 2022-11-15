<?
require_once 'class/FormChecker.class.php';
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$_SESSION['result'] = new FormChecker;

//подключаемся к БД
$db = new PDO('mysql:host=localhost;dbname=training', 'root', 'root');
//делаем запрос, который проверяет если ли значения поля в БД совпад за значение поля формы
$sql_select = "SELECT * FROM `users_reg` WHERE email=:email";
$statment = $db->prepare($sql_select);
$statment->execute(['email' => $email]);
$result = $statment->fetch(PDO::FETCH_ASSOC);

//старый код 
var_dump($_SESSION);

//если емайл существует, то выводим предупредением
if(!empty($result)) {
  //$_SESSION['result'] = 'Данный email уже есть';
}

//проверяем заполнены ли поля email
if(empty($email)) {
  //$_SESSION['error_email'] = 'Установите email';
}
//проверяем заполнены ли поля пароль
if(empty($password)) {
  //$_SESSION['error_password'] = 'Установите пароль';
}

$sql_insert = "INSERT INTO `users_reg` (`email`, `password`) VALUES (:email, :password)";
$statment = $db->prepare($sql_insert);
$statment->execute(['email' => $email, 'password' => $password,]);



?>
