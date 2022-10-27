<?error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

$id_page = $_GET['id'];
$users_lt = getUsers($db, $users_list_table);//получаем массив пользователей
$users_rt = getUsers($db, $users_reg_table);//получаем массив пользователей

$email = $_POST['email'];
$password = $_POST['password'];

//проверяем что бы поля не были пустыми 
checkfFieldEmptiness($email, $password, null, 'security.php?id='.$id_page);

//получаем id пользователя
$id_users_list_table = getUserById($users_lt);

//проверить занят ли емайл и не совпадает ли введеная почта с почтой профиля который редактирую
if(getUzerByEmail($email, $db, $users_reg_table) && !isOwnerProfile($users_lt, $id_page, $email)) {
  setFlashMassege('error', 'Данный почтовый адрес уже занят');
  redirect_to('security.php?id='.$id_page);
}

//получаем емайл пользователя, по которому получим id того же пользователя из другой таблицы
getUserByEmail($users_lt, $id_users_list_table);
//получаем id пользователя из второй таблицы
foreach($users_rt as $user) { 
  if(getUserByEmail($users_lt, $id_users_list_table) == $user['email']) {
    $id_users_reg_table = $user['id'];
  }
}

//изменяем данные
editCreadentials($email, null, $db, $id_users_list_table, $users_list_table);
editCreadentials($email, $password, $db, $id_users_reg_table, $users_reg_table);

if(isAdmin(getAuthenticatedUser()) && !isOwnerProfile($users_lt, $id_page, $email)) {
  setFlashMassege('success', 'Данные упешно обновлены');
  redirect_to('users.php');
}

setFlashMassege('success', 'Данные упешно обновлены');
redirect_to('login.php');
?>
