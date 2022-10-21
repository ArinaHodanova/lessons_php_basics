<?
error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

$email = $_POST['email'];
$password = $_POST['password'];

checkfFieldEmptiness($email, $password, null, null,  'login.php');//проверяем поля на пустоту

if(authorizationUser($email, $password, $db)) {//авторизация пользователя
  redirect_to('users.php');
}
?>
