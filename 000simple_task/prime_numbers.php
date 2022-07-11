<?php
//определаем яляется ли переданное число простым 
   function definePrimeNumbers(int $num) {
        $arr = [];
        $flag = true;
        for ($i = 2; $i < $num; $i++) {
             if ($num % $i === 0) {
                 $flag = 'Yes';
                  break;
              } else {
                    $flag = 'No';
              }
         }
         return $flag;
    }
        echo definePrimeNumbers(9);
?>
