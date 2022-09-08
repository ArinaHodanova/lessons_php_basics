<?
session_start();

$name = $_POST['name'];
$masseg = $_POST['masseg'];

if(!empty($_POST)) {
  $_SESSION['arr'][] = [$name,$masseg] ;
  //header("Location: s2.php");
}

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>

<form action="" method="post">
  <p><input type="text" name="name" placeholder="Ваше имя"></p>
  <p><input type="text" name="masseg" placeholder="Ваше сообщение"></p>
  <button type="submit" name="submit" value="on">Отправить</button>
</form>

<p><a href="s2.php" target="black">Перейти на s2.php</a></p>
