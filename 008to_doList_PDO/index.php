<?
session_start();
?>

<html lang="ru">
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https: //fonts.googleapis.com/css2?family= Roboto:ital, wght @0,100;0,300;0,400;0,500;1,100 & display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <title>Список дел</title>
</head>
<body>

    <div class="container">
      <h1>Список дел</h1>
      <form action="settings.php" method="post">
        <?if(!empty($_SESSION['error'])):?>
          <span class="danger"><?=$_SESSION['error']?></span>
        <?endif?>
        <?if(!empty($_SESSION['done'])):?>
          <span class="done"><?=$_SESSION['done']?></span>
        <?endif?>
        <input type="text" name="task" placeholder="Ваши задачи" class="form-control input-task">
        <button type="submit" name="send" class="btn btn-dark">Отправить</button>
      </form>

      <?require_once 'connect.php';//подключение к БД?>
      <ul class="task_list">
        <?$query = $pdo->query('SELECT * FROM `to_do` ORDER BY `id` DESC');?>
        <?while ($row = $query->fetch(PDO::FETCH_OBJ)):?>

          <li class="task_item">
            <h3><?echo htmlspecialchars(trim($row->task))?></h3>
            <div>
              <a class="task_link made" href="made.php?made=<?echo trim($row->task)?>&id=<?=$row->id?>">Сделано</a>
              <a class="task_link delete" href="delete.php?id=<?=$row->id?>">Удалить</a>
            </div>
          </li>
        <?endwhile?>
      </ul>

      <?if(!empty($_SESSION['made_task'])):?>
        <h2>Выполненные задачи</h2>
        <ul class="made-task_item">
          <?foreach($_SESSION['made_task'] as $elem):?>
            <li class="made-task_link">
              <span>✔</span>
              <h4><?=$elem?></h4>
            </li>
          <?endforeach?>
        </ul>
        <a class="btn btn-dark" href="dropmadetask.php?id=drop">Очистить</a>
      <?endif?>
    </div>  

</body>
</html>