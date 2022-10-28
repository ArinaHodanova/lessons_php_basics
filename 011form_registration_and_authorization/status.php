<?error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

$users_lt = getUsers($db, $users_list_table);//получаем массив пользователей
$users_rt = getUsers($db, $users_reg_table);//получаем массив пользователей
$users = getUsers($db, $users_list_table);//получаем массив пользователей
$id_page = $_GET['id'];
$arr_status = getArrStatus($db, $status_table );//массив статусов

//получаем статус 
if(isset($_POST['user_status'])) {
  $get_status = $_POST['user_status'];
}

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

$id_user_lt = getUserById($users_lt);//получаем id пользователя для того чтобы получить статус текщий
$status = getUserStatus($db, $id_user_lt, $users_list_table);

if(isset($get_status)) { 
  editStatus($get_status, $db, $id_user_lt, $users_list_table);
  setFlashMassege('success', 'Статус обновлен');
  redirect_to('users.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Добавить пользователя</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
  <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
  <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
  <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
  <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
  <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
  <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
  <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
  <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
  <script async src="js/main.js"></script>
</head>
<body>
  <main class="page-content">
    <h1>Установить статус</h1>
        <div class="row">
            <div class="col-4">
              
              <form action="" method="post">
                <select name="user_status">
                  <?foreach($arr_status as $value):?>
                      <option value="<?=$value['value']?>" <?= $status === $value['value'] ? 'selected' : null?> ><?=$value['status']?></option>
                  <?endforeach?>
                </select>

                <button type="submit" class="btn btn-primary">Редактировать</button>
              </form>

            </div>
        </div>
  </main>
</body>
