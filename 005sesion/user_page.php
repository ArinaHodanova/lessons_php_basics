<?
session_start();
?>
<h1><?=$_GET['name']?></h1>

<?
foreach($_SESSION['one_user'] as $key => $elem) {
  if($_GET['name'] == $key) {
    for($i = 0; $i <= count($elem); $i++) {
      echo $elem[$i] . '<br>';
    }
  }
}
?>

<a href="index.php">Вернуться в чат</a>
