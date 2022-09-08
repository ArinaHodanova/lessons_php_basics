<?
session_start();

$name = $_POST['name'];
$masseg = $_POST['masseg'];

if(isset($name)) {
  $_SESSION['name'] = $name;
}

if(isset($masseg)) {
  $_SESSION['masseg'] = $masseg;
}
?>

<form action="" method="post">
  <p><input type="text" name="name" placeholder="Ваше имя"></p>
  <p><input type="text" name="masseg" placeholder="Ваше сообщение"></p>
  <button type="submit" name="submit" value="on">Отправить</button>
</form>

<p><a href="s2.php" target="black">Перейти на s2.php</a></p>