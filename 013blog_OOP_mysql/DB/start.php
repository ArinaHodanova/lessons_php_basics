<?
$config = include __DIR__ . '/../config.php';
include __DIR__ . '/../DB/Connect.php';//подключение к БД
include __DIR__ . '/../DB/QueryBilder.php';//выполнение запроса

return new QueryBilder(
  Connect::make($config['database'])
);
?>
