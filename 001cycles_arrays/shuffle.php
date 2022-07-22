<?
//Функция должна перетасовать входящий массив и возвращает наиболее сбалансированные выходяшие
function  shuffleArray($num, $arr) {
function  shuffleArray($num, $arr) {
  if (!is_array($arr)) return $arr;
  
  $i = 1;
  while($i <= $num) {
    $shuffle_arr = shuffle($arr); //перемешиваем массив при каждой итерации 
    echo '<pre>' . 'перемешиваем';
    print_r($arr);
    echo '</pre>'; 

    //делим перемешанный вариант массива на две части
    $divide_half_shuffle_arr = SplitHalf($arr);
    echo '<pre>' . 'делим пополам';
    print_r($divide_half_shuffle_arr);
    echo '</pre>'; 

    //находим сумму частей 
    echo '<pre>' . 'сумма массива';
    print_r(multiArrSumKeys($divide_half_shuffle_arr));
    echo '</pre>';
    $i++;
  }
}

$shuffle_array = shuffleArray(2, $adds_unique_num_arr);
?>
