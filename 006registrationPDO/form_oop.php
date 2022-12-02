<?
$val = $_SESSION['validator'];
?>

<form action="setting_oop.php" method="post" class="form-group">
    <p>Подход: ООП</p>
        <?if($val->getIsEmptyEmail()):?>
            <p>заполните поле емейл</p>
        <?endif?>
        <div class="form-input">
            <label class="form-label" for="simpleinput">Email</label>
            <input type="text" name="email" id="simpleinput">
        </div>
        <?if($val->getIsEmptyPassword() ):?>
            <p>заполните поле пароль</p>
        <?endif?>
        <div class="form-input">
            <label class="form-label" for="simpleinput">Password</label>
            <input type="password" name="password" id="simpleinput">
        </div>
    <button type="submit" class="btn">Отправить</button>
</form>
