<?error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

$name_user = $_POST['name_user'];
$work_user = $_POST['work_user'];
$tel_user = $_POST['tel_user'];
$adress_user = $_POST['adress_user'];
$email_user = $_POST['email_user'];
$password_user = $_POST['password_user'];
$wk = $_POST['wk'];
$inst = $_POST['inst'];
$telegramm = $_POST['telegramm'];

checkfFieldEmptiness($email_user, $password_user, null, 'add_user.php');//проверяем поля обязательные для заполнени на пустоту
checkfPassword($password_user, 'add_user.php');//проверяем пароль количество символов

//если майл уже есть 
if(getUzerByEmail($email_user, $db, $users_reg_table)) {
  setFlashMassege('danger', 'Электронный адрес  уже существует');
  redirect_to('add_user.php');
}

//сохраняем пользователя
addUzer($email_user, $password_user, $db, $users_reg_table);
$id = addUzer($email_user, null, $db, $users_list_table);

//добавляем информацию о пользователе
editInformation($name_user, $work_user, $tel_user, $adress_user, $id, $db, $users_list_table);

if(!empty($avatar)){
  uploadAvatar($avatar_tmp, $avatar, $id, $db, $users_list_table);//сохраняем аватар в БД и на сервер
}

addSocialLinks($wk, $telegramm, $inst, $id, $db, $users_list_table) //передаем соц сети
setFlashMassege('danger', 'Профиль упешно создан');
redirect_to('users.php');
?>
