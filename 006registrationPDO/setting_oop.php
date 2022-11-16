<?
include  __DIR__ . '/class/connect.php';
session_start();

echo $_POST['email'] . '<br>';

//в массив передается только один параметр и его значение
$query->getOneUser('users_reg', ['email' => $_POST['email']]);

dd($query);
function dd($arr) {
  echo '<pre>';
  print_r($arr);
  echo '</pre>';
}
?>
