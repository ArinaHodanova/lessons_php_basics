<?
session_start();
require_once __DIR__ . '/class/Config.php';
require_once __DIR__ . '/class/Database.php';
require_once __DIR__ . '/class/Validate.php';
require_once __DIR__ . '/class/Input.php';
require_once __DIR__ . '/class/Token.php';
require_once __DIR__ . '/class/Session.php';
require_once __DIR__ . '/class/User.php';
require_once __DIR__ . '/class/Redirect.php';

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

  'session' => [
    'token_name' => 'token'
  ]
];

?>
