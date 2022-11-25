<?
session_start();
require_once 'function.php';
require_once 'init.php';

//Вывести список
$users = Database::getMake()->request('SELECT * FROM users_reg');

//Выполняем запрос с передачей и получанием одного параметра 
//$users = Database::getMake()->request('SELECT * FROM people WHERE fname = ?', ['Иванова']);

//Выполняем запрос с передачей и получанием множества параметров
//$users = Database::getMake()->request('SELECT * FROM people WHERE fname IN (?, ?, ?)', ['Николаева','Иванова', 'Юданова']);

/**
 * Запрос get где не используется sql запрос, а используется обертка
 * Первый параметр - название таблицы
 * Второй парамерт - поле , оператор, значение
*/
//$users = Database::getMake()->get('people' , ['id', '>' , '0']);
//метод, позволяющий вывести одного пользователя
//$users->first();

/**
 * Запрос delete где не используется sql запрос, а используется обертка
 * Первый параметр - название таблицы
 * Второй парамерт - поле , оператор, значение
*/
//Database::getMake()->delete('people' , ['id', '=' , '16']);

/**
 * Запрос insert где не используется sql запрос, а используется обертка
 * Первый параметр - название таблицы
 * Второй парамерт - многомерный массив если нуно ставить насколько значений и одномерный массив, если нужно вставить одно значение
*/
/*$users_set = Database::getMake()->insert('people' , [
    'name' => 'Оля',
    'fname' => 'Тест 1'
  ]
);*/

/**
 * Запрос update где не используется sql запрос, а используется обертка
 * Первый параметр - название таблицы
 * Второй парамерт - id пользователя
*/
/*$users_update = Database::getMake()->update('people' , 15, [
    'name' => 'Mira',
    'fname' => 'Erokhin'
  ]
);*/

$user = new User;//получаем текущег пользователя 
dd($user->data());

if($user->isLoggedIn()) {
   echo 'logged in';
}

$anotherUser = new User('200');//получаем пользователя по id 
dd($anotherUser->data()); 
if($anotherUser->isLoggedIn()) {
  echo 'logged in';
} else {
  echo 'not logged in';
}
?>
