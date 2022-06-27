<?
//написать функции, ищущие суммы масивов и сравнить их значение
//функция для вычитания суммы у многомерных массивов
function calculationMultiArrSum($arr) {
  foreach($arr as $key => $value) {
    foreach($value as $elem) {
      $sum  += $elem;
    }
  }
  return $sum;
}
calculationMultiArrSum($split_half_unique_arr);//передаем многомерный массив с рандомными значениями 

echo '<br>';
//функция для вычитания суммы у одномерного массива
function calculationOneArrSum($arr) {
  $length = count($arr);
  for($i = 0; $i < $length; $i++) {
    $sum  += $arr[$i];
  }
  return $sum;
}
calculationOneArrSum($adds_unique_num_arr);//передаем одномерный массив с рандомными значениями 
?>
