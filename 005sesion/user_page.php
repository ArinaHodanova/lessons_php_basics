<?
session_start();
?>

<html lang="ru">
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https: //fonts.googleapis.com/css2?family= Roboto:ital, wght @0,100;0,300;0,400;0,500;1,100 & display=swap" rel="stylesheet">
</head>

<h1 class="title_user">Все сообщения: <span><?=$_GET['name']?></span></h1>

<?foreach($_SESSION['one_user'] as $key => $elem):?>
  <?if($_GET['name'] == $key):?>
      <ul class="user_page_row">
        <!--Показываем сообщения от новых к старому-->
        <?for($i = count($elem) - 1; $i >= 0; $i--):?>
          <li class="user_page_mess">
            <span class="user_page_mess-text"><?=$elem[$i]?></span>
          </li>
        <?endfor?>
      </ul>
  <?endif?>
<?endforeach?>

<div class="btn_group">
  <a href="index.php" class="btn link">Вернуться в чат</a>
  <button class="btn drop" type="submit" name="submit" value="on">Удалить все сообщения</a></button>
<div>
