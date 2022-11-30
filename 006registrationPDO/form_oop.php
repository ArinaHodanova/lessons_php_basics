<?
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
$val = $_SESSION['validator'];
?>

<form action="setting_oop.php" method="post" class="form-group">
    <p>Подход: ООП</p>
        <?if($val->getIsEmptyEmail()):?>
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
