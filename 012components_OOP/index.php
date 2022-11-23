<?
session_start();
require_once 'function.php';
require_once 'conf.php';

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
//dd($users->result());
?>

<form action="setting.php" method="post">
    <div class="field">
        <label for="email">Your email<label>
        <input type="text" name="email" value="<?=Input::get('email')?>"></input>
    </div>

    <div class="field">
        <label for="pass">Your password<label>
        <input type="password" name="password" value="<?=Input::get('password')?>"></input>
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
