<?
//Добавить 2 проверяющие функции: первая считает 4 суммы, вторя выводит на печать 3 массива
//как проверка будет готова, напиши фукнцию, которая 10 раз перетасовывает входящий массив и передает его измененыый на сплит халф и запоминает опимальный полученный баланс

//функция для проверки суммы массива с рандомными числами и массивов правой и левой частью
function arrSumCheck($arr_split, $arr_random ) {

  //находим сумму массивов
  foreach ($arr_split as $key => $value) {
    $arr_split_key += $key;
    $arr_split_value += $value;  
  }
  $arr_split_sum = $arr_split_key + $arr_split_value;

  //находим суммы массива с рандомными числами
  $len = count($arr_random);
  for($i = 0; $i <= $len; $i++) {
    $sum_random_value += $arr_random[$i]; 
  }

  return ($arr_split_sum == $sum_random_value) ? $arr_split_sum  . ' равна ' . $sum_random_value : "Суммы не равны 1"; 

}
echo arrSumCheck($split_half_unique_arr, $adds_unique_num_arr);

?>
