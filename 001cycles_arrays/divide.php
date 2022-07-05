<?
// написать функцию делящую пополам между 2мя числовыми массивами полученный массив случайных чисел
function SplitHalf($arr) {
  $middle = count($arr) / 2; //находим середину массива

  //делим массив $arr на две части 
  $right_arr = array_slice($arr, $middle, $middle);
  $left_arr = array_slice($arr, 0, $middle);

  $examination_arr = [$right_arr, $right_arr];//сформируем массив для проверки 
  return  $examination_arr;
}
$split_half = SplitHalf($adds_unique_num_arr);
