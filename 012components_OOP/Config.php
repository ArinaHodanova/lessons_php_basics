<?
require_once 'Config.php';
require_once 'Database.php';
require_once 'Validate.php';
require_once 'Input.php';

$GLOBALS['config'] = [
  'mysql' => [
    'host' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'db' => 'training',
    'something' => [
      'no' => [
        'no' => 'goot'
      ]
    ]
  ],
];

if(Input::exists()) {
  $validate = new Validate();

  $validation = $validate->check($_POST, [
      'useremail' => [
        'required' => true,
        'min' => 2,
        'max' => 15,
        'unique' => 'users_reg'//уникальный емайл в таблице
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
 

  if($validation->passed()) {
    echo 'Passed';
  } else {
    foreach($validation->errors() as $error) {
      echo $error . '<br>';
    }
  }
}

?>
