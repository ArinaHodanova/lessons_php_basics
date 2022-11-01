<?error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

$users_lt = getUsers($db, $users_list_table);//получаем массив пользователей
$users_rt = getUsers($db, $users_reg_table);//получаем массив пользователей
$users = getUsers($db, $users_list_table);//получаем массив пользователей

$user_id = $_GET['id'];

$id_user_lt = getUserById($users_lt);//получаем id пользователя

if(empty($_FILES['avatar']['name'])) { 
  setFlashMassege('danger', 'Вы не загрузили фотографию');
  redirect_to('media.php?id='.$user_id);
}

$avatar = $_FILES['avatar']['name'];
$avatar_tmp = $_FILES['avatar']['tmp_name'];

uploadAvatar($avatar_tmp, $avatar, $id_user_lt , $db, $users_list_table);
setFlashMassege('success', 'Фотография успешно обновлена');
redirect_to('media.php?id='.$user_id); 
?>
