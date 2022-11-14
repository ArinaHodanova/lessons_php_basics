<?
include __DIR__ . '/../functions.php';

//1. настроить сервер, что б все запросы шли автоматич. на страницу/файл index.php
$route = getPath($_SERVER['REQUEST_URI']);

$routes = [
  "/" => "controller/homepage.php",
  "/homepage" => "controller/homepage.php",
  "/create.php" => "create.php",
  "/store.php" => "controller/store.php",
  "/delete" => "controller/delete.php",
  "/edit" => "/edit.php",
  "/update" => "controller/update.php",
  "/show" => "/show.php",
];

if(array_key_exists($route, $routes)) {
    include __DIR__ .  '/../' . $routes[$route];
    exit;
}  else {
    dd('404');
}
?>
