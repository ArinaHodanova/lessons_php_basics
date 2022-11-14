<?
$db = include __DIR__ . '/../DB/start.php';

//получаем все посты из БД
$posts = $db->getAll('posts');

//выводим через foreach
include __DIR__ . '/../index.view.php';