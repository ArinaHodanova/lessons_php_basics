<?error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

//если пользователь не авторизован то перенаправляем на страницу авторизации
if(isNotLoggedIn()) {
  redirect_to('login.php');
}

$users = getUsers($db, $users_list_table);//получаем массив пользователей

/*echo '<pre>';
print_r($users);
echo '</pre>';*/

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

//если пользователь админ и автор 
if(isAdmin(getAuthenticatedUser()) && isAvtor($users, $_GET['id'])) {
  setFlashMassege('danger', 'Это ваш профиль');
}

//если пользователь админ и открывает не свой профиль 
if(isAdmin(getAuthenticatedUser()) && !isAvtor($users, $_GET['id'])) {
  $users_one = gitUserProfil($users, $_GET['id']);
}

//если пользователь не админ и открывает не свой профиль
if(!isAdmin(getAuthenticatedUser()) && !isAvtor($users, $_GET['id']) ) {
  setFlashMassege('error', 'Это не ваш профиль');
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
    <!--если админ редактирует свой профиль-->
    <?if(!empty($_SESSION['danger'] )):?>
      <div class="alert alert-primary col-xl-4" role="alert"><?=displayFlashMassege('danger')?></div>
    <?endif?> 

    <?if(!empty($_SESSION['error'] )):?>
      <div class="alert alert-danger col-xl-4" role="alert"><?=displayFlashMassege('error')?></div>
    <?endif?> 

  <?//показываем профиль владельцу ?>
  <?if(isAvtor($users, $_GET['id'])):?>
  <?foreach($users as $user):?>
    <?if(isIdentical($user, getAuthenticatedUser())):?>
    <h1>Профиль: <?=$user['username']?></h1>

    <div class="row">
      <div class="col-md-6">
        <div style="width: 100px; height: 100px;">
          <img style="width: 100%" src="<?=$user['image']?>">
        </div>
        <div>
          <h2>Имя: <?=$user['username']?></h2>
          <p>Работа: <?=$user['job_title']?></p>
          <p>Телефон: <?=$user['phone']?></p>
          <p>Почта: <?=$user['email']?></p>
          <?if(!empty($user['vk']) || !empty($user['telegram']) || !empty($user['instagram'])):?>
            <h3>Социальные сети</h3>
          <?endif?>
          <?if(!empty($user['vk'])):?>
            <ul>
              <li><?=$user['vk']?></li>
              <li><?=$user['telegram']?></li>
              <li><?=$user['instagram']?></li>
            </ul>
          <?endif?>
        </div>
      </div>
    </div>
    <?endif?>
  <?endforeach?>
  <?endif?>

  <?//если пользователь админ и не автор?>
  <?if(isset($users_one )):?>
    <?
     echo '<pre>';
     print_r($users_one );
     echo '<pre>'; 
    ?>
  <?endif?>


  <a href="users.php">Вернуться к списку пользователей</a>
  </main>
</body>
