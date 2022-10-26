<?error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

//если пользователь не авторизован то перенаправляем на страницу авторизации
if(isNotLoggedIn()) {
  redirect_to('login.php');
}

$id_page = $_GET['id'];

$users = getUsers($db, $users_list_table);//получаем массив пользователей

//если пользователь не админ и заходит на страничку другого пользователя
if(!isAdmin(getAuthenticatedUser())) { 
  if(!isAvtor($users, $_GET['id'])) {
      setFlashMassege('error', 'Вы можете редактировать только свой профиль');
      redirect_to('users.php');
  }
}

//если пользователь админ и заходит на страничку своего пользователя
if(isAdmin(getAuthenticatedUser())) { 
  if(isAvtor($users, $_GET['id'])) {
      setFlashMassege('danger', 'Вы редактируете свой профиль');
  }
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
    <h1>Редактировать профиль</h1>

    <!--если админ редактирует свой профиль-->
    <?if(!empty($_SESSION['danger'] )):?>
      <div><?=displayFlashMassege('danger')?></div>
    <?endif?> 

  <div class="row">
    <div class="col-4">

    <form action="edit_user.php?id=<?=$id_page?>" method="post" enctype="multipart/form-data">
      <h2>Общая информация</h2>
      <div>
          <lable for="name_user-add">Имя</lable>
          <input type="text" name="name_user"  class="form-control" id="name_user-add">
      </div>
      <div>
          <lable for="work_user-add">Место работы</lable>
          <input type="text" name="work_user"  class="form-control" id="work_user-add">
      </div>
      <div>
          <lable for="tel_user-add">Телефон</lable>
          <input type="tel" name="tel_user"  class="form-control" id="tel_user-add">
      </div>
      <div>
          <lable for="adress_user-add">Адрес</lable>
          <input type="tel" name="adress_user"  class="form-control" id="adress_user-add">
      </div> 

      <button type="submit" class="btn btn-primary">Редактировать</button>

    </div>
  </div>

  </mail>
</body>
