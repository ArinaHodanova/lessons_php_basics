<?
// написать функцию делящую пополам между 2мя числовыми массивами полученный массив случайных чисел
function SplitHalfUniqueArr($arr) {
  //работаем с массивом со стандартной функцией

  $middle = count($arr) / 2; //находим середину массива

  //делим массив $arr на две части 
  $right_arr = array_slice($arr, $middle, $middle);
  $left_arr = array_slice($arr, 0, $middle);

  $examination_arr = [$right_arr, $right_arr];//сформируем массив для проверки 
  return  $examination_arr;
}
$split_half_unique_arr = SplitHalfUniqueArr($adds_unique_num_arr);
