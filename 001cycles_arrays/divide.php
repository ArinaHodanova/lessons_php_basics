<?
// написать функцию делящую пополам между 2мя числовыми массивами полученный массив случайных чисел
// считающую и сравнивающую сумму чисел в каждом получившемся массиве

function SplitHalfUniqueArr($arr) {
  //работаем с массивом со стандартной функцией
  $length = count($arr); //находим длину массива
  $middle = count($arr) / 2; //находим середину массива

 
  $left_side_arr = [];
  $right_side_arr = [];
  for($i = 0; $i < $middle; $i++ ) {//находим левую часть массива
    $left_side_arr[] = $arr[$i];//создаем массив с левой частью массива функции $adds_unique_num_arr
    $value_left_arr += $left_side_arr[$i];//находим сумму значений массива с левой частью
  }
  echo $value_left_arr . '<br>';

  for($i = $middle; $i < $length; $i++ ) {//находим правую часть 
    $right_side_arr = $arr[$i];//создаем массив с правой частью массива функции $adds_unique_num_arr
    $value_right_arr += $right_side_arr;
  }
  echo $value_right_arr . '<br>';

}
SplitHalfUniqueArr($adds_unique_num_arr);
?>
