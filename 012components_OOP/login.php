<?
require_once 'init.php';
require_once 'function.php';
session_start();

if(Input::exists()) {

  if(Token::check(Input::get('token'))) {

      $validate = new Validate();

      $validate->check($_POST, [
        'email' => [
          'required' => true,
          'email' => true,
        ],
        'password' => [
          'required' => true,
        ]
      ]
    );

      if($validate->passed()) {
        $user = new User;
        $login = $user->login(Input::get('email'), Input::get('password'));
          if($login) {
              echo 'Login succesful'; 
          } else {
              echo 'Login failed';
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
        <label for="email">Your email<label>
        <input type="text" name="email" value="<?=Input::get('email')?>">
    </div>

    <div class="field">
        <label for="pass">Your password<label>
        <input type="password" name="password">
    </div>

    <div class="field">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me<label>      
    </div>

    <input type="hidden" name="token" value="<?=Token::generate();?>">

    <div class="field">
        <button type="submit">Submit</buttin>
    </div>
</form>
