<?
require_once 'function.php';
session_start();
?>

<div class="message__row">
<?if(!empty($_SESSION['one_user'])):?>
<?foreach($_SESSION['one_user'] as $key => $elem):?>

  <?//реализуем кнопку удаления
    if($_GET['val'] == $key) {
      unset($_SESSION['one_user'][$key]);
      redirect();
    }
  ?>

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
    <a class="drop_messages" href="index.php?val=<?=$key?>">х</a>
  </div><!--/masseg__inner-->

<?endforeach?>
<?endif?>
</div>
