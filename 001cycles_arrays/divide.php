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

  for($i = $middle; $i < $length; $i++ ) {//находим правую часть 
    $right_right_arr = $arr[$i];//создаем массив с правой частью массива функции $adds_unique_num_arr
    $value_right_arr += $right_right_arr;
  }

  if($value_left_arr > $value_right_arr) {
    return 'Левая часть - ' . $value_left_arr . ' больше правой - ' . $value_right_arr; 
  } elseif($value_left_arr < $value_right_arr) {
    return 'Правая часть - ' . $value_right_arr . ' больше левой - ' . $value_left_arr; 
  } else {
    return 'Левая' . $value_left_arr . ' и правая' . $value_right_arr . ' части равны'; 
  }

}
echo SplitHalfUniqueArr($adds_unique_num_arr);
?>
