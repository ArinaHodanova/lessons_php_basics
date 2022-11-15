<?
session_start();
require_once 'class/FormChecker.class.php';
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

    <?//Пример?>
    <?include 'get_session_mess.php'//Вывод сессиии?>
    <form action="sitting.php" method="post" class="form-group">
        <div class="form-input">
            <label class="form-label" for="simpleinput">Email</label>
            <input type="text" name="email" id="simpleinput">
        </div>
        <div class="form-input">
            <label class="form-label" for="simpleinput">Password</label>
            <input type="password" name="password" id="simpleinput">
        </div>
        <button type="submit" class="btn">Отправить</button>
    </form>


    <?//С ооп?>
    <?include 'get_session_mess.php'//Вывод сессиии?>
    <form action="sitting_oop.php" method="post" class="form-group">
        <div class="form-input">
            <label class="form-label" for="simpleinput">Email</label>
            <input type="text" name="email" id="simpleinput">
        </div>
        <div class="form-input">
            <label class="form-label" for="simpleinput">Password</label>
            <input type="password" name="password" id="simpleinput">
        </div>
        <button type="submit" class="btn">Отправить</button>
    </form>

    </main>
</body>
