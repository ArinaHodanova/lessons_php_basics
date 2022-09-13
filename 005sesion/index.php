<?php
//error_reporting(-1);
header("Content-type: text/html; charset=utf-8");
session_start();
require_once 'function.php';
?>
<html lang="ru">
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<form action="" method="post" class="form">
  <?
    if($_SESSION['done_mass']) {
      echo '<p class="mass">' . $_SESSION['done_mass'] . '</p>';
    }
    ?>

  <div class="form_field">
    <input type="text" name="name" placeholder="Ваше имя">
    <span class=""><?=$_SESSION['error_user_name']?></span>
  </div>

  <div class="form_field">
    <textarea type="text" name="masseg" placeholder="Ваше сообщение"></textarea>
    <span><?=$_SESSION['error_masseg']?></span>
  </div>

  <div>
    <input type="checkbox" name="checkbox" id="check1" value="on">
    <label for="check1">Это важное сообщение</label>
  </div>

  <button type="submit" name="submit" value="on">Отправить</button>
</form>

<div class="masseg__row">
<?if(!empty($_SESSION['arr'])):?>
  <?for($i = 0; $i < count($_SESSION['arr']); $i++):?>
  
    <?if($_SESSION['arr'][$i]['check'] == 'on'):?>
      <div class="masseg__inner bold">
    <?else:?>
      <div class="masseg__inner normal">
    <?endif?>
        <p class="masseg__inner-nam">
          <span class="masseg__inner-name">Ваше имя: </span>
          <a href="user_page.php" target="_blank"><span><?=$_SESSION['arr'][$i]['name']?></span></a>
        </p>
        <p class="masseg__inner-nam">
          <span class="masseg__inner-name">Ваше сообщение: </span>
          <span><?=$_SESSION['arr'][$i]['masseg']?></span>
        </p>
      </div><!--/masseg__inner-->

  <?endfor?>
  <?endif?>
</div>
?>
