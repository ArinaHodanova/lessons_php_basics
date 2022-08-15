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




/*Усложняем задачу с банкоматом
1) в банкомате ограниченное количество купюр каждого номинала, количество передается в функцию
2) номиналы банкомата 1000,500,100,50,10 руб.
3) автомат может выдать сумму только кратную имеющимся в наличии купюрам
4) при нехватке денег или нессответствующей суммы, или суммы большей чем есть в наличии оповещаем
5) принципы выдачи незименны - автомат пытается выдать самым крунпным номиналом из того что есть в
*/
        $money_bank = [500 => 1, 100 => 3, 10 => 1, 50 => 2, 1000 => 2];//купюры в наличии 
        function issueMoneyLimit($request_sum, $money_bank_arr) {
            krsort($money_bank_arr);//массив с выданными купюрами
            $sum_presence = 0;//сумма купюр в банке
            $request_sum_value = $request_sum;
            
            foreach ($money_bank_arr as $nominal => $qt_nominal) {
                for ($i = 1; $i <= $qt_nominal; $i++) {
                    $sum_presence = $sum_presence + $nominal;//определяем общею сумму номинала, которую банк может выдать
                }
            }

            if($sum_presence < $request_sum) {
                return 'Запрашиваемой суммы нет в наличии. Максимальная сумма выдачи - ' . $sum_presence . '<br>';
            }  else {
                foreach ($money_bank_arr as $nominal => $qt_nominal) {
                    while($request_sum >= $nominal && $qt_nominal > 0) {
                        $request_sum = $request_sum - $nominal;
                        $qt_nominal--;
                        $delivery_banknot[] = $nominal;  
                    }
                }
            }
            
            if(array_sum($delivery_banknot) == $request_sum_value) {
                return $delivery_banknot;
            } else {
                //если в банкомате не хватает купюр
                //также ближайшая купюра для выдачи 
                $remainder =  $request_sum_value - array_sum($delivery_banknot);
                $delivery_remainder = $request_sum_value - $remainder;
                return 'В банкомате не хватает купюр. Можно запросить купюру ' . $delivery_remainder;
            }
        }

        echo '<pre>';
        print_r(issueMoneyLimit(2750, $money_bank));
        echo '</pre>';
?>
