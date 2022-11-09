<?
require_once 'functions.php';
$db = require_once 'DB/start.php';//подключаемся к БД
$post = $db->getOne('posts', $_GET['id']);
?>

<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Create Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-md-8 offet-md-2">
            <form class="" action="update.php?id=<?=$_GET['id']?>" method="post">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="input-group mb-3"
                value="<?=$post['title']?>"> 
              </div>
              <div class="form-grop">
                <button type="submit" class="btn btn-warning">Edit Post</button>
              </div>
            </form>
        </div>
      </div>
    </body>
</html>

<h2>
  Пост № <?=$_GET['id']?>
</h2>
