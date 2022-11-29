<?
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

echo '<pre>';
print_r($_POST);
echo '</pre>';

?>
<form action="setting_oop.php" method="post" class="form-group">
    <p>Подход: ООП</p>
        <p></p>
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
