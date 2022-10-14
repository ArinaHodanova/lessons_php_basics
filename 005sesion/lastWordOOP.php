<?
require_once 'function.php';
?>

<div class="messages__row">
<?//если не пустая сессия с новым массивом, то продолжаем работу?>
<?if(!empty($_SESSION['one_user_oop'])):?>

<?foreach($_SESSION['one_user_oop'] as $key => $elem):?>

  <?//реализуем кнопку удаления
  if(!empty($_GET['val'])) {
    if($_GET['val'] == $key) {
      unset($_SESSION['one_user_oop'][$key]);
      redirect();
    }
  }
  ?>

  <!--выводим колличество сообщений-->
  <?$amount = count($elem)?>

  <!--Выводим только последнее сообщение-->
  <?$last_value = end($elem);?>

  <div class="message__container">
    <div class="message__info">
    <p class="message__inner-nam">
      <span class="message__field">Имя: </span>
      <a class="message__name" href="user_page.php?name=<?=$key?>"><?=$key?></a>
      <!--.Педедаем имя гет параметром-->
      <span class="message__inner-amount">(<?=$amount?> шт.)</span>
    </p>
    <p class="message__inner-nam message">
      <span class="message__field">Сообщение: </span>

      <span class="message__text <?=($last_value->getCheckbox() == 'on') ? "big": "plain"?>">
        <?=$last_value->getMessages()?>
      </span>
    </p>
    
      <div class="message_btn">
        <a class="message__inner-link btn" href="user_page.php?name=<?=$key?>">Все сообщения</a>
        <a class="message__inner-drop drop_messages" href="index.php?val=<?=$key?>">Удалить сообщения</a>
      </div>
    
    </div><!--/message__info-->
  </div><!--/masseg__inner-->

<?endforeach?>
<?endif?>
</div>
