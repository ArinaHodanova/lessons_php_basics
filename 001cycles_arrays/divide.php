<?
// написать функцию делящую пополам между 2мя числовыми массивами полученный массив случайных чисел
function SplitHalfUniqueArr($arr) {
  //работаем с массивом со стандартной функцией
  $length = count($arr); //находим длину массива
  $middle = count($arr) / 2; //находим середину массива

  $left_side_unique_arr = [];
  $right_side_unique_arr = [];

  //делим массив с рандомными значениями на два массива. И находим сумму значений каждого полученного массива
  for($i = 0; $i < $length; $i++ ) {
    if($i < $middle) { 
        $left_side_unique_arr[$i] = $arr[$i];//в новый массив выводим значения левой части массива с рандомными значениями (функция $adds_unique_num_arr)
    } elseif( $i >= $middle) {
        $right_side_unique_arr[] = $arr[$i];//в новый массив выводим значения правой части массива с рандомными значениями (функция $adds_unique_num_arr)
    }
  }

  $examination_arr = [$left_side_unique_arr, $right_side_unique_arr];//сформируем массив для проверки 
  return  $examination_arr;
}
$split_half_unique_arr = SplitHalfUniqueArr($adds_unique_num_arr);
