<?
echo '<pre>';
var_dump($_SESSION['form_check']);
echo '</pre>';

echo $_SESSION['form_check']->check();
?>

<form action="setting_oop.php" method="post" class="form-group">
    <p>Подход: ООП</p>
        <?if(0):?>
            <p>Ошибка</p>
        <?endif?>
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
