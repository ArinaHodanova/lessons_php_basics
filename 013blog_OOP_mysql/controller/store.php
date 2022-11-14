<?
$db = include __DIR__ . '/../DB/start.php';//подключаемся к БД

$db->create('posts', [
  'title' => $_POST['title']
]);

header('Location: homepage');
?>