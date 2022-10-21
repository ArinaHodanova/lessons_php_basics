<?
define('DB_DRIVER', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'training');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');

//Название таблиц
$users_reg_table = `users_reg`;

try {
  $db = new PDO(DB_DRIVER.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  print $e->getMessage(); 
}
?>
