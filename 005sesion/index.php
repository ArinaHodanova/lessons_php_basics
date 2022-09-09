<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);
session_start();

if(!empty($_POST)) {
  $name = $_POST['name'];
  $masseg = $_POST['masseg']; 
  if(!isset($_POST['checkbox'])) {
    $_POST['checkbox'] = 'off';
  } 
  $checkbox = $_POST['checkbox'];
}

$_SESSION['arr'][] = ['name'=> $name, 'masseg' => $masseg, 'check' => $checkbox];

echo '<pre>';
echo 'SESSION ';
print_r( $_SESSION);
echo '</pre>';

echo '<pre>';
echo 'POST ';
print_r($_POST);
echo '</pre>';

?>

<form action="" method="post">
  <p><input type="text" name="name" placeholder="Ваше имя"></p>
  <p><input type="text" name="masseg" placeholder="Ваше сообщение"></p>

  <p>
    <input type="checkbox" name="checkbox" id="check1" value="on">
    <label for="check1">Это важное сообщение</label>
  </p>

  <button type="submit" name="submit" value="on">Отправить</button>
</form>


<?if(!empty($_SESSION['arr'])):?>
  <?for($i = 0; $i < count($_SESSION['arr']); $i++):?>
    <?if($_SESSION['arr'][$i]['check'] !== 'on'):?>
      <div>
        <span><?=$_SESSION['arr'][$i]['name']?></span>
        <span><?=$_SESSION['arr'][$i]['masseg']?></span>
      </div>
    <?else:?>
      <div>
        <span><b><?=$_SESSION['arr'][$i]['name']?></b></span>
        <span><b><?=$_SESSION['arr'][$i]['masseg']?></b></span>
      </div>
    <?endif?>
    <hr>
  <?endfor?>
<?endif?>

<!--<p><a href="s2.php" target="black">Перейти на s2.php</a></p>-->
?>
