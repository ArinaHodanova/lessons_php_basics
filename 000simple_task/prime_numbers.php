<?php
//определаем яляется ли переданное число простым 
   function definePrimeNumbers(int $num) {
        $arr = [];
        $flag = true;
        for ($i = 2; $i < $num; $i++) {
             if ($num % $i === 0) {
                  $flag = false;
                  break;
              } else {
                  $flag = true;
              }
         }
         return $flag;
    }
        echo definePrimeNumbers(9);
?>
