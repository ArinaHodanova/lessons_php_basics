<?
error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

$email = $_POST['email'];
$password = $_POST['password'];

checkfFieldEmptiness($email, $password, null, 'login.php');//проверяем поля на пустоту

authorizationUser($email, $password, $db);//запрос на существование емайл в БД
?>