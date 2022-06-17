<?
echo 'Создать массив из случайных уникальных целых чисел скажем от 0 до 200 - 6 уникальных чисел' . '<br>';
//в цикле добавить счетчик сколько случайных чисел было создано
//Разделить эти числа на 2 массива, так чтобы сумма чисел в каждом массиве была равна или если это невозможно, то разница между суммами массивов была минимальна
 
//Cоздать одно случайное целое число от 1 до 200
$min = 0; //мин. число
$max = 200; //макс. число
$amount = 7; //количество уникальных чисел для значения в массив 

//вариант со стандартной функцией 
function addsUniqueNumberArray($amount_unique_num, $min, $max) {
  $arr_rand = []; //массив случайных чисел 
  $count_num = 0; //счетчик сколько случайных чисел
  $i = 0;
  while($i < $amount_unique_num) {
        $rand_num = mt_rand($min, $max);
        if(!in_array($rand_num, $arr_rand)) {//проверяем на уникальность 
            $arr_rand[$i] = $rand_num;//уникальное число добавляем в массив 
            $i++; 
        }
    $count_num++;//подсчет колличества случайных чисел
  }
  return $arr_rand;
}

//вариант с уникальным ключем 
function addsUniqueКeyArray($amount_unique_num, $min, $max) {
  $arr_rand = []; //массив случайных чисел 
  $count_num = 0; //счетчик сколько случайных чисел

  $i = 0;
  while ($i < $amount_unique_num) {
    $rand_num = mt_rand($min, $max);
    
    if(!array_key_exists($rand_num, $arr_rand)){ //проверяем на уникальность ключей 
      $arr_rand[$rand_num]++;
      $i++; 
    }
    
    $count_num++;//подсчет колличества случайных чисел
  }
  return $arr_rand;
}

//вариант со стандартной функцией
echo '<pre>';
print_r(addsUniqueNumberArray($amount, $min, $max));
echo '</pre>';

//вариант с уникальным ключем 
echo '<pre>';
print_r(addsUniqueКeyArray($amount, $min, $max));
echo '</pre>';
