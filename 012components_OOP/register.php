<?
session_start();
require_once 'function.php';
require_once 'init.php';

//обработчик формы
if(Input::exists()) {
  //значение токина совпадает со значение пользователя 
  if(Token::check(Input::get('token'))) {
    $validate = new Validate();

    $validation = $validate->check($_POST, [
      'username' => [
        'required' => true,
        'min' => 2,
        'max' => 30,
      ],
      'email' => [
        'required' => true,
        'email' => true,
        'unique' => 'users_reg',//уникальный емайл в таблице
      ],
      'password' => [
        'required' => true,
        'min' => 3
      ],
      'password_again' => [
        'required' => true,
        'matches' => 'password'
      ]
    ]);

    if($validate->passed()) { 
        $user = new User();
        $user->create([
          'username' => Input::get('username'),
          'email' => Input::get('email'),
          'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT),//хешируем пароль
        ]);
        Session::put('success', 'register success');
        Redirect::to('login.php');
    } else {
      foreach($validate->errors() as $error) {
        echo $error . '<br>';
      }
    }

  }
}
?>

<?echo Session::flash('error');?>
<form action="" method="post">
    <div class="field">
        <label for="username">Your name<label>
        <input type="text" name="username" value="<?=Input::get('username')?>"></input>
    </div>

    <div class="field">
        <label for="email">Your email<label>
        <input type="text" name="email" value="<?=Input::get('email')?>"></input>
    </div>

    <div class="field">
        <label for="pass">Your password<label>
        <input type="password" name="password"></input>
    </div>

    <div class="field">
        <label for="pass_again">Password Again<label>
        <input type="text" name="password_again"></input>
    </div>

    <input type="hidden" name="token" value="<?=Token::generate();?>">

    <div class="field">
        <button type="submit">Submit</buttin>
    </div>
</form>
