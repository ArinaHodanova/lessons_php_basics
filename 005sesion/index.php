<?
error_reporting(-1);
header("Content-type: text/html; charset=utf-8");
require_once 'class/userMessage.php';
session_start();

?>

<html lang="ru">
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https: //fonts.googleapis.com/css2?family= Roboto:ital, wght @0,100;0,300;0,400;0,500;1,100 & display=swap" rel="stylesheet">
</head>

<form action="settings.php" method="post" class="form">
  <?if(!empty($_SESSION['done_mass'])):?>
    <p class="mass"><?=$_SESSION['done_mass']?></p>
  <?endif?>  

  <div class="form_field">
    <input type="text" name="name" placeholder="Ваше имя">
    <?if(!empty($_SESSION['error_user_name'])):?>
      <span class=""><?=$_SESSION['error_user_name']?></span>
    <?endif?>       
  </div> 

  <div class="form_field">
    <textarea type="text" name="message" placeholder="Ваше сообщение"></textarea>
    <?if(!empty($_SESSION['error_message'])):?>
      <span class=""><?=$_SESSION['error_message']?></span>
    <?endif?>
  </div>

  <div>
    <input type="checkbox" name="check" id="check1">
    <label for="check1">Это важное сообщение</label>
  </div>

  <button type="submit" name="submit" class="btn">Отправить</button>
</form>

<?
//require_once 'lastWord.php'; //версия с процедурным подходом
require_once 'lastWordOOP.php'; //версия с ООП подходом
?>
