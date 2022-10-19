<?
error_reporting(-1);
require_once __DIR__ . '/function.php';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Регистрация</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <script async src="js/main.js"></script>
</head>
<body>
  <main>
    <div class="container">
      <h2>Регистрация</h2>
        <div class="row">
            <div class="col-4">

                <?if(isset($_SESSION['error'])):?>
                  <div class="vssd"><?=displayFlashMassege('error')?></div>
                <?endif?>

                <!--если на странице регистрации пользователь ввел почту, которая существует в ДБ-->
                <?if(!empty($_SESSION['danger'] )):?>
                    <div><?=displayFlashMassege('danger')?></div>
                <?endif?>
                
                <form action="register.php" method="post">
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

                  <div class="mb-3">
                    <label for="verificPass" class="form-label">Подтверждение пароля</label>
                    <input type="password" name="verific_password" class="form-control" id="verificPass">
                  </div>
                  <button type="submit" class="btn btn-primary">Отправить</button>
                </form>

          </div>
        </div>
    </div>
  </main>
</body>


