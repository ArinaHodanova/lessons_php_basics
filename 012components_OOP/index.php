<?
session_start();
$config = require_once 'config.php';
include 'function.php';
require_once 'Database.php';

//Вывести список
//$users = Database::getMake()->request('SELECT * FROM people');

//Выполняем запрос с передачей и получанием одного параметра 
//$users = Database::getMake()->request('SELECT * FROM people WHERE fname = ?', ['Иванова']);

//Выполняем запрос с передачей и получанием множества параметров
//$users = Database::getMake()->request('SELECT * FROM people WHERE fname IN (?, ?, ?)', ['Николаева','Иванова', 'Юданова']);

/**
 * Запрос get где не используется sql запрос, а используется обертка
 * Первый параметр - название таблицы
 * Второй парамерт - поле , оператор, значение
*/
//$users = Database::getMake()->get('people' , ['id', '>' , '0'])->result();
//dd($users);

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
$users_set = Database::getMake()->update('people' , 41, [
  'name' => 'Ольга',
  'fname' => 'Юманова'
]);

$users = Database::getMake()->request('SELECT * FROM people');
dd($users->result());
?>
