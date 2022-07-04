<?
//Функция должна перетасовать входящий массив и возвращает наиболее сбалансированные выходяшие
function  shuffleArray($num, $arr) {
  if (!is_array($arr)) return $arr;

  $middle = count($arr) / 2;//находим середину массива
  $i = 1;
  $difference_arr = [];//масив, который будет накапливать значения, полученные от сумм массива

  while($i <= $num) {
    shuffle($arr); //перемешиваем массив при каждой итерации 

    $right_arr_value_sum = 0; //сумма массива правой части
    $left_arr_value_sum = 0; //сумма массива левой части
    
    //делим массив напополам
    $right_arr = array_slice($arr, $middle, $middle);
    $left_arr = array_slice($arr, 0, $middle);
    $difference = 0;
    
    //получаем сумму значений массивов
    $left_arr_value_sum = array_sum($left_arr);
    $right_arr_value_sum = array_sum($right_arr);

    //получаем разность сумм значений массивов
    $difference = $left_arr_value_sum - $right_arr_value_sum;
    $i++;
  }
}

$shuffle_array = shuffleArray(3, $adds_unique_num_arr);
?>
