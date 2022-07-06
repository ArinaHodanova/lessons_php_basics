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
$calculation_multi_arr_sum = calculationMultiArrSum($split_half_unique_arr);//передаем многомерный массив с рандомными значениями 

//функция для вычитания суммы у одномерного массива
function calculationOneArrSum($arr) {
  $length = count($arr);
  for($i = 0; $i < $length; $i++) {
    $sum  += $arr[$i];
  }
  return $sum;
}
$calculation_one_arr_sum = calculationOneArrSum($adds_unique_num_arr);//передаем одномерный массив с рандомными значениями 

//функция сравнения сумм двух массивов
function compareSumArrays($multi_arr, $one_arr) {
  if($one_arr == $multi_arr) {
      return true;
  } else {
      return false;
  }
}
compareSumArrays($calculation_multi_arr_sum, $calculation_one_arr_sum);
?>
