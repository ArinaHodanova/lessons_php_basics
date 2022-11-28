<?
require_once 'function.php';
require_once 'init.php';

$user = new User;//получаем текущего пользователя 
$user->logout();

Redirect::to('index.php');

?>
