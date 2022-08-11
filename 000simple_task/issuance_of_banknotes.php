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

   foreach($money_bank_arr as $nominal) {
       while($request_sum >= $nominal) {
           $request_sum = $request_sum - $nominal;
           $delivery_banknot[] = $nominal; 
       }
    }

   return $delivery_banknot;
}
 echo '<pre>';
 print_r(issueMoney(100, $money_bank));
 echo '</pre>';
?>
