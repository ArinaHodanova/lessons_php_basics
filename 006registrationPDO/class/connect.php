<?
$config = include __DIR__ . '/../conf.php';
$db = include __DIR__ . '/Connect.class.php';//подключение к БД
include __DIR__ . '/FormChecker.class.php';
include __DIR__ . '/QueryBilder.class.php';

$query = new QueryBilder (
  Connect::make($config['db'])//подключаемся к БД
);
?>
