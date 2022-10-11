<?
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Регистрация и авторизация</title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
<main>
   
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <?echo !empty($_SESSION['user'])? '<h2>Вы авторизованы</h2>': '<h2>Вы не авторизованы</h2>';?>
        <div>
          <?if(!empty($_SESSION['user'])):?> 
              <a href="personal_office.php" class="btn btn-info">Войти</a>
            <?else:?> 
              <a href="auth.php" class="btn btn-info">Войти</a>
          <?endif?> 
          <a href="exit.php?exit=<?=$_SESSION['user']['email']?>" class="btn btn-danger">Выйти</a>
        </div>
      </div>
    </div>            
  </div>  
        
  </main>
</html>