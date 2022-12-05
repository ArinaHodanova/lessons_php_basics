<?
session_start();
require_once 'function.php';
require_once 'init.php';

//обработчик формы
//есть поле не пустое
$user = new User; 
$validate = new Validate();
$validate->check($_POST , [
  'current_password' => [
    'required' => true,
    'min' => 2,
  ], 
  'new_password' => [
    'required' => true,
    'min' => 2,
  ],
  'password_again' => [
    'required' => true,
    'min' => 2,
    'matches' => 'new_password',
  ],
]);

if(Input::exists()) { 
  if(Token::check(Input::get('token'))) { 
    if($validate->passed()) {
      //если текущий пароль не совпадает с паролем пользователя в БД
      if(password_verify(Input::get('current_password'), $user->data()->password)) {
        $user->update(['password' => password_hash(Input::get('new_password'), PASSWORD_DEFAULT)]);
        Session::flash('success', 'Пароль обновился');
        Redirect::to("index.php");
      } else {
        echo 'Incorrect current password';
      }
      
    } else {
        foreach($validate->errors() as $error) {
          echo $error . '<br>';
        }
    }
  }
}
?>

<form action="" method="post">
    <div class="field">
        <label for="username">Current password<label>
        <input type="text" name="current_password"></input>
    </div>

    <div class="field">
        <label for="username">New password<label>
        <input type="text" name="new_password"></input>
    </div>

    <div class="field">
        <label for="username">New password again<label>
        <input type="text" name="password_again"></input>
    </div>

    <input type="hidden" name="token" value="<?=Token::generate();?>">

    <div class="field">
        <button type="submit">Submit</buttin>
    </div>
</form>
