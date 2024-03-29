<?
error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

$email = $_POST['email'];
$password = $_POST['password'];
$verific_password = $_POST['verific_password'];//подтверждение пароля

checkfFieldEmptiness($email, $password, $verific_password, 'registration.php');//проверяем поля на пустоту;
checkfPassword($password, 'registration.php');//проверяем пароль количество символов
checkfPasswordVerific($password, $verific_password, 'registration.php');//проверяем подтверждение пароля

//если майл уже есть 
if(getUzerByEmail($email, $db, $users_reg_table)) {
  setFlashMassege('danger', 'Электронный адрес  уже существует');
  redirect_to('registration.php');
}

//проверяем емайл в таблице с пользователями
if(getUzerByEmail($email, $db, $users_list_table)) {
  setFlashMassege('danger', 'Электронный адрес уже существует. Пройдите авторизацию');
  redirect_to('login.php');
}

//сохраняем пользователя
addUzer($email, $password, $db, $users_reg_table);
addUzer($email, null, $db, $users_list_table);

//перекидываем на страницу авторизации
setFlashMassege('success', 'Вы зарегистрировались, пройдите авторизацию что бы зайти в личный кабинет');
redirect_to('login.php');
?>
