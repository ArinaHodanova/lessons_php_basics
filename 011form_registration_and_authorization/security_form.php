<?error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

$id_page = $_GET['id'];
$users = getUsers($db, $users_list_table);//получаем массив пользователей

$email = $_POST['email'];
$password = $_POST['password'];

echo '<pre>';
print_r($_SESSION['user']);
echo '</pre>';

//проверяем что бы поля не были пустыми 
checkfFieldEmptiness($email, $password, null, 'security.php?id='.$id_page);

//получаем id пользователя
$id_users = getUserById($users);

//проверить занят ли емайл и не совпадает ли введеная почта с почтой профиля который редактирую
if(getUzerByEmail($email, $db, $users_reg_table) && !isOwnerProfile($users, $id_page, $email)) {
  setFlashMassege('error', 'Данный почтовый адрес уже занят');
  redirect_to('security.php?id='.$id_page);
}
echo $id_users;
