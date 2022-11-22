<?
$form_chek = new Validator();
$form_chek->check (
    [
        'password' => $_POST['password'],
        'email' => $_POST['email'],
    ]
);
?>
<form action="setting_oop.php" method="post" class="form-group">
    <p>Подход: ООП</p>
        <p>Подход: ООП</p>
         <?if(!empty($form_chek->error())):?>
            <p><?=$form_chek->error()?></p>
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
