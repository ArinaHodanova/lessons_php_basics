<?error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Добавить пользователя</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
  <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
  <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
  <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
  <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
  <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
  <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
  <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
  <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
  <script async src="js/main.js"></script>
</head>
<body>
  <main class="page-content">
    <h1>Профиль пользователя</h1>

    <!--если админ редактирует свой профиль-->
    <?if(!empty($_SESSION['danger'] )):?>
      <div><?=displayFlashMassege('danger')?></div>
    <?endif?> 
  </main>
</body>
