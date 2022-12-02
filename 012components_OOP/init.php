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
    'token_name' => 'token',
    'user_session' => 'user'
  ]
  
  'cookie' => [
    'cookie_name' => 'hash',
    'cookie_expiry' => 604800//cрок хранения куки
  ],
];

if(Cookie::exists(Config::get('cookie.cookie_name')) && !Session::exists(Config::get('session.user_session'))) {
  $hash = Cookie::get(Config::get('cookie.cookie_name'));
  $hashCheck = Database::getMake()->get('user_session', ['hash', '=', $hash]);

  if($hashCheck->count()) {
    $user = new User($hashCheck->first()->userid);
    $user->login();
  }
}
?>
?>
