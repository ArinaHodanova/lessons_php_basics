<?
require_once 'DB/Connect.php';//подключение к БД
require_once 'DB/QueryBilder.php';//выполнение запроса

return new QueryBilder(
  Connect::make()
);
?>
