<?error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

if(isset($_POST['name_user'])) {
  $user_name = $_POST['name_user'];
}
if(isset($_POST['work_user'])) {
  $user_work = $_POST['work_user'];
}
if(isset($_POST['tel_user'])) {
  $user_tel = $_POST['tel_user'];
}
if(isset($_POST['adress_user'])) {
  $user_adress = $_POST['adress_user'];
}

$users = getUsers($db, $users_list_table);//получаем массив пользователей
$id = getUserById($users);//получаем id пользователя, чей профиль редактируется

editInformation($user_name, $user_work, $user_tel, $user_adress, $id, $db, $users_list_table);
setFlashMassege('danger', 'Профиль упешно обновлен');
redirect_to('user_profil.php?id='.$id_page);
?>
