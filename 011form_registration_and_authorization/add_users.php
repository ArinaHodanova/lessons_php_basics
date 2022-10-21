<?error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

//если пользователь не авторизован и не админ то перебрасываем на страницу авторизации
if(isNotLoggedIn() || !isAdmin(getAuthenticatedUser())) {
  redirect_to('login.php');
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
    <h1>Добавить пользователя</h1>
    <?if(isset($_SESSION['error'])):?>
      <div class="vssd"><?=displayFlashMassege('error')?></div>
    <?endif?>

    <!--если на странице регистрации пользователь ввел почту, которая существует в ДБ-->
    <?if(!empty($_SESSION['danger'] )):?>
      <div><?=displayFlashMassege('danger')?></div>
    <?endif?>

    <div class="row">
            <div class="col-4">

    <form action="create_user.php" method="post" enctype="multipart/form-data">
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

      <h2>Безопасность</h2>
      <div>
          <lable for="email_user-add">Ваша электронная почта</lable>
          <input type="email" name="email_user"  class="form-control" id="email_user-add">
      </div>
      <div>
          <label for="pwd">Пароль</label>
          <input type="password" id="pwd" name="password_user" class="form-control">
          <button type="button" id="eye">
            <img src="https://cdn0.iconfinder.com/data/icons/feather/96/eye-16.png" alt="eye"/>
          </button>
      <div>
          <label for="ava">Аватар</label>
          <input type="file" name="avatar" class="form-control" foid="ava"/>
      </div>

      <h2>Соц.сети</h2>
      <div>
          <lable for="wk_user-add">VK</lable>
          <input type="text" name="wk"  class="form-control" id="wk_user-add"/>
      </div>
      <div>
          <lable for="inst_user-add">Instagram</lable>
          <input type="text" name="inst"  class="form-control" id="inst_user-add"/>
      </div>
      <div>
          <lable for="telegramm_user-add">Telegramm</lable>
          <input type="text" name="telegramm"  class="form-control" id="telegramm_user-add"/>
      </div>
      <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
    
    </div>
    </div>
  </mail>
</body>
