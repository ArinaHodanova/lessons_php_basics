<?
// написать функцию делящую пополам между 2мя числовыми массивами полученный массив случайных чисел
// считающую и сравнивающую сумму чисел в каждом получившемся массиве

function SplitHalfUniqueArr($arr) {

  //работаем с массивом со стандартной функцией
  $length = count($arr); //находим длину массива
  $middle = count($arr) / 2; //находим середину массива

  $left_side_arr = [];
  $right_side_arr = [];

  //делим массив с рандомными значениями на два массива. И находим сумму значений каждого полученного массива
  for($i = 0; $i < $length; $i++ ) {
    if($i < $middle) { 
        $left_side_arr[$i] = $arr[$i];//в новый массив выводим значения левой части массива с рандомными значениями (функция $adds_unique_num_arr)
        $value_left_arr += $left_side_arr[$i];//находим сумму значений массива  
    } elseif( $i >= $middle) {
        $right_right_arr[] = $arr[$i];//в новый массив выводим значения правой части массива с рандомными значениями (функция $adds_unique_num_arr)
    }
  }

  //находим сумму значений массива, состоящий из правой части значений массива с рандомными значениями 
  for($i = 0; $i < count($right_right_arr); $i++) {
    $value_right_arr += $right_right_arr[$i];//
  }

  //производим сравнение суммы значений массивов 
  if($value_left_arr > $value_right_arr) {
    echo 'Левая часть - ' . $value_left_arr . ' больше правой - ' . $value_right_arr; 
  } elseif($value_left_arr < $value_right_arr) {
    echo 'Правая часть - ' . $value_right_arr . ' больше левой - ' . $value_left_arr; 
  } else {
    echo'Левая' . $value_left_arr . ' и правая' . $value_right_arr . ' части равны'; 
  }
}
SplitHalfUniqueArr($adds_unique_num_arr);
?>
