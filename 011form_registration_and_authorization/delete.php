<?error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

$users_lt = getUsers($db, $users_list_table);//получаем массив пользователей
$users_rt = getUsers($db, $users_reg_table);//получаем массив пользователей
$users = getUsers($db, $users_list_table);//получаем массив пользователей
$id = $_GET['id']; 

//если пользователь не авторизован то перенаправляем на страницу авторизации
if(isNotLoggedIn()) {
  redirect_to('login.php');
}

//если пользователь не админ и заходит на страничку другого пользователя
if(!isAdmin(getAuthenticatedUser()) && !isAvtor($users, $_GET['id'])) { 
    setFlashMassege('error', 'Вы можете редактировать только свой профиль');
    redirect_to('users.php');
}

//если пользователь админ и заходит на страничку своего пользователя
if(isAdmin(getAuthenticatedUser()) && isAvtor($users, $_GET['id'])) { 
  setFlashMassege('danger', 'Вы редактируете свой профиль');
} 

$id = getUserById($users);//id пользователя по гет параметру4
$email = getUserByEmail($users_lt, $id);//получаем почту владельца пользователя
//получаем id пользователя из другой таблицы
$id_user_rt_table = getUserOwnerById($users_rt, $email);

//echo $id . ' - ' . $id_user_rt_table . ' - ' . $email;

delet($db, $id_user_rt_table, $users_reg_table);
delet($db, $id, $users_list_table);

//если пользователь удаляет свой профиль, то удаляем сессию
if(!isAvtor($users, $id)) {
  setFlashMassege('success', 'Профиль удален');
  redirect_to('users.php');
  exit;
} 

//если пользователь удаляет свой профиль, то удаляем сессию и перенаправляем перенаправляем на страницу регистрации
unset($_SESSION['user']);
redirect_to('registration.php');
?>
