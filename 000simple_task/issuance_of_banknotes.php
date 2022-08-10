<?
Написать функцию которая будет выдавать купюры из банкоматы. функция принимает запрашиваемую сумму а возвращает массив с выданными купюрами.
  Условия:
    1 - выдать посетителю наименьшее количество банкнот
    2 - предполагается что запрашиваемая сумма есть в налчии
    3 - банковский счет нащего клиента бесконечен
    4 - бесконечное количество банкнот
    5 - есть в наличии купюры 100, 50, 20, 10
      
$money_bank = [100, 50, 20, 10];//купюры в наличии 
  function issueMoney($request_sum, $money_bank_arr) {
      $delivery_banknot = [];//массив с выданными купюрами

      for($i = 0; $i < count($money_bank_arr); $i++) {
          $nominal = $money_bank_arr[$i];//текущая купюра

          while($request_sum >= $nominal) {
              $request_sum = $request_sum - $nominal;
              $delivery_banknot[] = $nominal;
              echo $request_sum  . '<br>';
          }

          //если запрашиваемое число = купюре из банкоматы
          if($request_sum == $money_bank_arr[$i]) {
              //echo $money_bank[$i] . '<br>';
              //break;
          } 
      }
  }
  issueMoney(60, $money_bank);
?>
