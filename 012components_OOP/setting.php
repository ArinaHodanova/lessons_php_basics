<?
session_start();
require_once 'function.php';
require_once 'conf.php';

//обработчик формы
if(Input::exists()) {
  //значение токина совпадает со значение пользователя 
  if(Token::check(Input::get('token'))) {
    $validate = new Validate();

    $validation = $validate->check($_POST, [
      'email' => [
        'required' => true,
        'min' => 2,
        'max' => 30,
        'validate_email' => true,
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
        $user->create([
          'email' => Input::get('email'),
          'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT),//хешируем пароль
        ]);
        Session::flash('success', 'register success');
        Redirect::to('admin_panel.php');
    } else {
      foreach($validate->errors() as $error) {
        echo $error . '<br>';
      }
    }

  }
}
?>
