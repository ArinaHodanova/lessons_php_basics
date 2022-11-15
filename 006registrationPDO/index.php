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

    <?//Процедурный эталон?>
    <?//include 'get_session_mess.php'//Вывод сессиии?>
    <form action="setting.php" method="post" class="form-group" style="display:none">
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


    <?//ООП?>
    <?include 'get_session_mess_oop.php'//Вывод сессиии?>
    <?$_SESSION['result']->getIsEmptyEmail()?>
    
    <form action="setting_oop.php" method="post" class="form-group">
    <p>ООП форма</p>
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

    <?//тест класса регенератора формы?>

    </main>
</body>
