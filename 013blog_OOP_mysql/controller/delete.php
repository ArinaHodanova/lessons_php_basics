<?
echo 'lf';
$db = include __DIR__ . '/../DB/start.php';//подключаемся к БД

$db->delete('posts', $_GET['id']);
echo 'Да';
//header('Location: /');
?>