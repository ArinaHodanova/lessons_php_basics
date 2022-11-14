<?
$db = include __DIR__ . '/../DB/start.php';//подключаемся к БД

$post = $db->update('posts', [
    'title' => $_POST['title']
  ],
  $_GET['id']);
header('Location: /');
?>
