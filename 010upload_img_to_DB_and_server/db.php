<?
//соединение с БД
try {
  $db = new PDO('mysql:host=localhost;dbname=training', 'root', 'root');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  print $e->getMessage(); 
}

//вывод изображений
$sql = "SELECT * FROM `images`";
$statment = $db->prepare($sql);
$statment->execute();

$result = $statment->fetchAll();

?>