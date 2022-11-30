<?
error_reporting(-1);
include  __DIR__ . '/class/connect.php';
session_start();
$_SESSION['form_check'] = new Validator();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Форма регитрации</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <main>

    <?//Данный код выполнен в процедурном стиле?>
    <?//include 'form_procedur.php'?>

    <?//Данный код выполнен с ООП?>
    <?include 'form_oop.php'?>

    </main>
</body>
