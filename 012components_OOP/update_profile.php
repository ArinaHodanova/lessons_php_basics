<?
session_start();
require_once 'function.php';
require_once 'init.php';

//обработчик формы
//есть поле не пустое
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

$user = new User; 
$validate = new Validate();
$validate->check($_POST , [
  'username' => [
    'required' => true,
    'min' => 2,
    'max' => 30,
  ]
]);

if(Input::exists()) { 
  if(Token::check(Input::get('token'))) { 
    if($validate->passed()) {
      $user->update(['username' => Input::get('username')]);
      Redirect::to("update_profile.php");
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
        <label for="username">Your name<label>
        <input type="text" name="username" value="<?=Input::get('username')?>"></input>
    </div>

    <input type="hidden" name="token" value="<?=Token::generate();?>">

    <div class="field">
        <button type="submit">Submit</buttin>
    </div>
</form>
