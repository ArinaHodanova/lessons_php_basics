<?
//Функция должна перетасовать входящий массив и возвращает наиболее сбалансированные выходяшие
function  shuffleArray($num, $arr) {
  if (!is_array($arr)) return $arr;

  $middle = count($arr) / 2;//находим середину массива
  $i = 1;
  $difference_arr = [];//накапиаем разность полученную от сумм левой и правой части массивов 

  while($i <= $num) {
    shuffle($arr); //перемешиваем массив при каждой итерации 
    
    $right_arr_value_sum = 0; //сумма массива правой части
    $left_arr_value_sum = 0; //сумма массива левой части    
    $difference = //разноть полученнная от ссумм  правой части и  левой части массива;

    //делим массив напополам
    $left_arr = array_slice($arr, 0, $middle);
    $right_arr = array_slice($arr, $middle, $middle);

    //получаем сумму значений массивов
    $left_arr_value_sum = array_sum($left_arr);
    $right_arr_value_sum = array_sum($right_arr);

    //получаем разность сумм значений массивов
    $difference = $left_arr_value_sum - $right_arr_value_sum;
    $difference_arr[] = abs($difference);
    $i++; 
  }
  return $difference_arr;//абсолютное значение разности выходящего массива
}

$shuffle_array = shuffleArray(2, $adds_unique_num_arr);
?>
