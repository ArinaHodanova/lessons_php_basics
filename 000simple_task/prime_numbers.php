<?php
        //определяем простые числа 
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

        $prime_num_arr = [];//массив простых чисел 
        //передаем набор чисел и выводим в массив простые числа
        for($i = 2; $i <= 100; $i++) {
            if(definePrimeNumbers($i) == true) {
                $prime_num_arr[] = $i;
            }
        }
?>
