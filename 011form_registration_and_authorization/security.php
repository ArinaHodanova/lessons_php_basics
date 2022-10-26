<?error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

$id_page = $_GET['id'];
$users = getUsers($db, $users_list_table);//получаем массив пользователей

echo '<pre>';
print_r($_SESSION['user']);
echo '</pre>';

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
    <h1>Редактировать пароль и почту</h1>
        <div class="row">
            <div class="col-4">

    <!--если пользователь пытается отредактировать не свою страницуы-->
    <?if(!empty($_SESSION['error'] )):?>
      <div class="alert alert-danger" role="alert"><?=displayFlashMassege('error')?></div>
    <?endif?>

    <?if(!empty($_SESSION['danger'] )):?>
      <div class="alert alert-primary" role="alert"><?=displayFlashMassege('danger')?></div>
    <?endif?>
                
                <!--form-->
                <form action="security_form.php?id=<?=$id_page?>" method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ваша электронная почта</label>
                    <input type="email" name="email"  class="form-control" id="exampleInputEmail1">
                  </div>
                  <div class="mb-3">
                    <label for="pwd" class="form-label">Пароль</label>
                    <input type="password" id="pwd" name="password" class="form-control">
                    <button type="button" id="eye">
                        <img src="https://cdn0.iconfinder.com/data/icons/feather/96/eye-16.png" alt="eye" />
                    </button>
                  </div>

                  <button type="submit" class="btn btn-primary">Редактировать</button>
                </form>
                <!--/form-->

          </div>
        </div>
    </div>
  </main>
</body>
