<?
session_start();
if(!empty($_SESSION)) {
  $arr[$_SESSION['name']] = $_SESSION['masseg'];
}

echo '<pre>';
print_r($arr);
echo '</pre>';
?>

<p><a href="index.php">Назад</a></p>
