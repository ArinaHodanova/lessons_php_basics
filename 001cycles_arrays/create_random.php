<?
echo 'Создать массив из случайных уникальных целых чисел скажем от 0 до 200 - 6 уникальных чисел';
//в цикле добавить счетчик сколько случайных чисел было создано
//Разделить эти числа на 2 массива, так чтобы сумма чисел в каждом массиве была равна или если это невозможно, то разница между суммами массивов была минимальна
 
//Cоздать одно случайное целое число от 1 до 200
$min = 0; //мин. число
$max = 200; //макс. число
$count_number = 200; //диапозон поиска чисел
$amount = 7; //количество уникальных чисел для значения в массив 

//вариант со страндартной функцией 
function addsUniqueNumberArray($amount_unique_num, $min, $max) {
  $arr_rand = []; //массив случайных чисел 
  $count_num = 0; //счетчик сколько случайных чисел
  $i = 0;
  while($i <= $amount_unique_num - 1) {
        $rand_num = mt_rand($min, $max);
 
        if(!in_array($rand_num, $arr_rand)) {//проверяем на уникальность || задаем минимальную длину массива
            $arr_rand[$i] = $rand_num;//уникальное число добавляем в массив
        }
        $i++;
    $count_num++;//подсчет колличества случайных чисел
  }
}

//вариант с уникальным ключем 
function addsUniqueКeyArray($amount_unique_num, $min, $max) {
  $arr_rand = []; //массив случайных чисел 
  $count_num = 0; //счетчик сколько случайных чисел

  for ($i = 0; $i <= $amount_unique_num - 1; $i++) {
      $rand_num = mt_rand($min, $max);
      ++$arr_rand[$rand_num];
      $count_num++;//подсчет колличества случайных чисел
  }
}


$t1 = microtime(true); 
for($i=0; $i<10000; $i++){
    echo addsUniqueNumberArray($amount, $min, $max);;
}
$t2 = microtime(true); 
$t1=$t2-$t1;
echo $t1 . '<br>';

$t1 = microtime(true); 
for($i=0; $i<10000; $i++){
    echo addsUniqueКeyArray($amount, $min, $max);;
}
$t2 = microtime(true); 
$t1=$t2-$t1;
echo $t1 . '<br>';
?>
