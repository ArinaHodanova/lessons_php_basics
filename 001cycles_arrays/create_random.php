//Cоздать одно случайное целое число от 1 до 200
$min = 0; //мин. число
$max = 200; //макс. число
$count = 200; //диапозон поиска чисел
$amount = 6; //количество уникальных чисел для значения в массив 

//функцию которая добавляет уникальное число в массив, те получает рандомное число, проверяет есть ли оно в массиве, и добавляет его если его там нет
function addsUniqueNumberArray($amount_unique_num, $min, $max) {
  $arr_rand = []; //массив случайных чисел 

  for($i = 0; $i <= $amount_unique_num; $i++) {
    $rand_num = mt_rand($min, $max);
    $count_num = 0;

      if(!in_array($rand_num, $rand_num)) {//проверяем на уникальность
        $arr_rand[$i] = $rand_num;//уникальное число добавляем в массив

          echo '<pre>';
          print_r($rand_num);
          echo '</pre>';
      }
  }

}
addsUniqueNumberArray($amount, $min, $max);
