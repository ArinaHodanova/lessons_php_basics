<?error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

$users_lt = getUsers($db, $users_list_table);//получаем массив пользователей
$users_rt = getUsers($db, $users_reg_table);//получаем массив пользователей
$users = getUsers($db, $users_list_table);//получаем массив пользователей

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
    <h1>Установить изображение</h1>
    <p><a href="users.php">К списку пользователей</a></p>
        <div class="row">
            <div class="col-4">

            <?if(!empty($_SESSION['error'] )):?>
              <div class="alert alert-danger col-xl-4" role="alert"><?=displayFlashMassege('error')?></div>
            <?endif?>

            <?if(!empty($_SESSION['danger'] )):?>
                <div class="alert alert-primary col-xl-4" role="alert"><?=displayFlashMassege('danger')?></div>
            <?endif?>

            <?if(!empty($_SESSION['success'])):?>
              <div class="alert alert-danger col-xl-4" ><?=displayFlashMassege('success')?></div>
            <?endif?>

            <?foreach($users as $user):?>
              <?if($user['id'] === $_GET['id']):?>
                <span class="mr-3">
                  <span>Утановить новый аватар</span>
                  <span class="profile-image d-block" style="background-image:url(<?=$user['image']?>); background-size: cover; width: 10rem; height: 10rem; border-radius: 90%"></span>
                </span>

                <form method="post" enctype="multipart/form-data" action="media_form.php?id=<?=$user['id']?>">
                  <div>
                    <label for="ava">Аватар</label>
                    <input type="file" name="avatar" class="form-control" foid="ava"/>
                  </div>
                  <button type="submit" class="btn btn-primary">Отправить</button>
                </form>

            <?endif?>
            <?endforeach?>
            
            </div>
        </div><!--/row-->
  </main>
</body>
