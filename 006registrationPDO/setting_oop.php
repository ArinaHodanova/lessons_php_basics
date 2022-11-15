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

?>
