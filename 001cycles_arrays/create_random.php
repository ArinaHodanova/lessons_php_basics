//Cоздать одно случайное целое число от 1 до 200
$min = 0; //мин. число
$max = 10; //макс. число
$count = 200; //диапозон поиска чисел
$amount = 7; //количество уникальных чисел для значения в массив 

//функцию которая добавляет уникальное число в массив, те получает рандомное число, проверяет есть ли оно в массиве, и добавляет его если его там нет
function addsUniqueNumberArray($amount_unique_num, $min, $max) {
  
  $arr_rand = []; //массив случайных чисел 
  $count_num = 0;//

  $i = 0;
  while($i <= $amount_unique_num - 1) {
    $rand_num = mt_rand($min, $max);
    if(!in_array($rand_num, $arr_rand) || count($arr_rand[$i]) <= $amount_unique_num) {//проверяем на уникальность || задаем минимальную длину массива
    $arr_rand[$i] = $rand_num;//уникальное число добавляем в массив
    }
    $i++;
  }
 
  echo '<pre>';
  print_r($arr_rand);
  echo '</pre>';

}
addsUniqueNumberArray($amount, $min, $max);
