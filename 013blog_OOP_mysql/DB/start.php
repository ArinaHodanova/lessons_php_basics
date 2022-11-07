<?
$config = require_once 'config.php';
require_once 'DB/Connect.php';
require_once 'DB/QueryBilder.php';

return new QueryBilder(
  Connect::make($config['database'])
);
?>
