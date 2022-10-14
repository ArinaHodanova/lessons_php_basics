<?
session_start();
$pictures_name = $_FILES["pictures"]['name'];
$pictures_tmp = $_FILES["pictures"]['tmp_name'];
$pictures_type = $_FILES["pictures"]['type'];
$path = 'uploads/';
$filedir = $path.$pictures_name;

//проверяем поле с картинкой не было пусто
if(empty($pictures_tmp)) {
  $_SESSION['error'] = 'Загрузите картинку';
  header("Location: index.php");
  exit;
}

//проверяем что бы файл был картинкой
$formats_img = array("image/png", "image/gif", "image/jpeg", "image/svg+xml");
if(!in_array($pictures_type, $formats_img)) {
  $_SESSION['error'] = 'Данный функционал только для загрузки картинок';
  header("Location: index.php");
  exit;
}

//коннектимся с БД
require_once __DIR__ . '/db.php';

//проверяем не совпадает ли название и тип новой картинку с названием и типом картинки из БД
$sql = "SELECT * FROM `images` WHERE name=:name";
$statment = $db->prepare($sql);
$statment->execute(['name' => $pictures_name]);
$rezult = $statment->fetch(PDO::FETCH_ASSOC);
//если совпадения найдены выводим предупреждение и останавливаем работу скрипта
if(!empty($rezult)) {
  $_SESSION['error'] = 'Название картинки должно быть уникальным';
  header("Location: index.php");
  exit;
}

//передаем информацию в БД
//передаем путь и имя картинки
$sql = "INSERT INTO `images` (`name`, `src`) VALUES (:name, :src)";
$statment = $db->prepare($sql);

//привязывает параметры запроса к переменной и 3 параметром можно установить тип
$statment->bindParam(':name', $pictures_name, PDO::PARAM_STR);
$statment->bindParam(':src', $pictures_tmp, PDO::PARAM_STR);//путь картинки 
$statment->execute();

//загружаем файл на сервер
move_uploaded_file($pictures_tmp, $filedir);

$_SESSION['done'] = 'Файл загружен';
//header("Location: index.php");
//exit;
?>
