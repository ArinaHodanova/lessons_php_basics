<?
require_once 'function.php';
require_once 'connect.php';
$value_id = $_GET['id'];

$sql = 'DELETE FROM `to_do` WHERE `id` = ?';
$query = $pdo->prepare($sql);
$query->execute([$value_id]);
redirect();
?>