<?
session_start();
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

    <?if(isset($_SESSION['result'])): ?>
    <div class="danger" role="alert">
        <?=$_SESSION['result'];unset($_SESSION['result']);?>
    </div>
    <?endif?>

    <?if(isset($_SESSION['error_email'])): ?>
    <div class="danger" role="alert">
        <?=$_SESSION['error_email']; unset($_SESSION['error_email']);?>
    </div>
    <?endif?>

    <?if(isset($_SESSION['error_password'])): ?>
    <div class="danger" role="alert">
        <?=$_SESSION['error_password']; unset($_SESSION['error_password']);?>
    </div>
    <?endif?>

    <?if(isset($_SESSION['success'])): ?>
    <div class="success" role="alert">
        <?=$_SESSION['success']; unset($_SESSION['success']);?>
    </div>
    <?endif?>

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

    </main>
    </body>

