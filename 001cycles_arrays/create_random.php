<?php
//echo 'Создать массив из случайных уникальных целых чисел скажем от 0 до 200 - 6 уникальных чисел';
//в цикле добавить счетчик сколько случайных чисел было создано
//Разделить эти числа на 2 массива, так чтобы сумма чисел в каждом массиве была равна или если это невозможно, то разница между суммами массивов была минимальна
 
//Cоздать одно случайное целое число от 1 до 200
$min = 0; //мин. число
$max = 10; //макс. число
$count_number = 200; //диапозон поиска чисел
$amount = 7; //количество уникальных чисел для значения в массив 

//функцию которая добавляет уникальное число в массив, те получает рандомное число, проверяет есть ли оно в массиве, и добавляет его если его там нет
function addsUniqueNumberArray($amount_unique_num, $min, $max) {
  
  $arr_rand = []; //массив случайных чисел 
  $count_num = 0; //счетчик сколько случайных чисел

  $i = 0;
  while($i < $amount_unique_num) {
    $rand_num = mt_rand($min, $max);

        if(!in_array($rand_num, $arr_rand)) {//проверяем на уникальность || задаем минимальную длину массива
            $arr_rand[$i] = $rand_num;//уникальное число добавляем в массив
            $i++;
        }
        $count_num++; //подсчет не уникальных чисел 
  }
//	echo $count_num.PHP_EOL;
  //print_r($arr_rand);
	return $arr_rand;

}
addsUniqueNumberArray($amount, $min, $max);
?>
