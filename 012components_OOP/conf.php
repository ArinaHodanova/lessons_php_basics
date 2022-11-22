<?
require_once 'Config.php';
require_once 'Database.php';

$GLOBALS['config'] = [
  'mysql' => [
    'host' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'db' => 'users_db',
    'something' => [
      'no' => [
        'no' => 'goot'
      ]
    ]
  ],
  
  'session' => [
    'token_name' => 'token'
  ],
  
];

?>
