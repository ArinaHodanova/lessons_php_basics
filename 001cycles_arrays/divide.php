<?
// написать функцию делящую пополам между 2мя числовыми массивами полученный массив случайных чисел
// считающую и сравнивающую сумму чисел в каждом получившемся массиве

function SplitHalfUniqueArr($arr) {

  //работаем с массивом со стандартной функцией
  $length = count($arr); //находим длину массива
  $middle = count($arr) / 2; //находим середину массива

  $left_side_arr = [];
  $right_side_arr = [];
  for($i = 0; $i < $length; $i++ ) {
    if($i < $middle) {
        $left_side_arr[$i] = $arr[$i];
        $value_left_arr += $left_side_arr[$i];
    } elseif( $i >= $middle) {
      $right_right_arr[$i] = $arr[$i];
        //$value_right_arr += $right_right_arr[$i];
    }
  }

}
echo SplitHalfUniqueArr($adds_unique_num_arr);
?>
