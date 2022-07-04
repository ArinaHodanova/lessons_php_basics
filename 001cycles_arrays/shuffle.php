<?
//Функция должна перетасовать входящий массив и вернуть наиболее сбалансированные выходяшие
function  shuffleArray($num, $arr) {
  if (!is_array($arr)) return $arr;

  $middle = count($arr) / 2;//находим середину массива
  $i = 1;
  $difference_arr = [];//масив, который будет накапливать значения, полученные от сумм массива

  while($i <= $num) {
    shuffle($arr); //перемешиваем массив при каждой итерации 
    
    echo '<pre>';
    print_r($arr);
    echo '</pre>';

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
    $difference_arr[] = $difference;//разность сумм значений массивов записываем вновый массив 
    
    //вычисляем наиболее близкое к 0 число 
    $max_value_arr = [];//массив с положит. значениями 
    $min_value_arr = [];//массив с отриц.  значениями 
    foreach($difference_arr as $value) {
      if($value >= 0) {
        $max_value_arr[] = $value;
      } 
      if($value < 0) {
        $min_value_arr[] = $value;
      } 
    }

    //если массив с положительными значениями не пустой
    if(!empty($max_value_arr)) {
      $positive_value = min($max_value_arr);//находит самое мин число среди положительных 
    }
    //если массив с отриц значениями не пустой
    if(!empty($min_value_arr)) {
      $negative_value = max($min_value_arr);//находим самое мин число среди отрицательных
    }

    $i++;
  }
  
}

$shuffle_array = shuffleArray(3, $adds_unique_num_arr);
?>
