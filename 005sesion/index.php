<?
//error_reporting(-1);
header("Content-type: text/html; charset=utf-8");
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
  <?if($_SESSION['done_mass']) {
      echo '<p class="mass">' . $_SESSION['done_mass'] . '</p>';
    }?>

  <div class="form_field">
    <input type="text" name="name" placeholder="Ваше имя">
    <span class=""><?=$_SESSION['error_user_name']?></span>
  </div>

  <div class="form_field">
    <textarea type="text" name="message" placeholder="Ваше сообщение"></textarea>
    <span><?=$_SESSION['error_message']?></span>
  </div>

  <div>
    <input type="checkbox" name="check" id="check1">
    <label for="check1">Это важное сообщение</label>
  </div>

  <button type="submit" name="submit" value="on" class="btn">Отправить</button>
</form>

<div class="message__row">
<?if(!empty($_SESSION['one_user'])):?>
<?foreach($_SESSION['one_user'] as $key => $elem):?>
  <?$amount = count($elem)?>

  <div class="message__inner normal bold">
    <div class="message__info">
    <p class="message__inner-nam">
      <span class="message__inner-name">Имя: </span>
      <a href="user_page.php?name=<?=$key?>"><?=$key?></a>
      <!--.Педедаем имя гет параметром-->
      <span class="message__inner-amount">(<?=$amount?> шт.)</span>
    </p>
    <p class="message__inner-nam">
      <span class="message__inner-name">Сообщение: </span>
      <span class="message__inner-massage">
        <!--Выводим только последнее сообщение-->
        <?$value = end($elem); echo $value?>
      </span>
    </p>
    
    <a class="message__inner-link" href="user_page.php?name=<?=$key?>">Посмотреть все сообщения пользователя - <?=$key?></a>
    </div>
    <a class="drop_messages" href="index.php?val=<?=$val?>">х</a>
  </div><!--/masseg__inner-->

<?endforeach?>
<?endif?>
</div>
