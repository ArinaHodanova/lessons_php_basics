<?
       //Дано число. Определить, является ли введенное число палиндромом. 
        $num = 500000305;

        function definNum($num) {
            //проверяем является ли число целым
            if (!is_int($num)) return $num;

            if(definIntNumPalindrome($num)) {
                echo 'Palindrome';
            }  else {
                echo 'No Palindrome';
            }
        }
        definNum($num);


        function definIntNumPalindrome($num) {

            $arr = str_split(strval($num));//преобразуем в массив
            $overlap_arr = [];//массив со значениями которые совпали

            //перебираем значение сравнивая их с начала и конца входящего массива
            for($i = 0, $j = count($arr) - 1; $i <= count($arr) - 1; $i++, $j--) {
                //при первом же расхождении завершаем цикл
                if($arr[$i] !== $arr[$j]) break;

                //числа, которые совпали заносим в массив
                $overlap_arr[$i] = $arr[$j];
            }

            //если длина вход массива и массива со соппадающими значи равно, то число палиндромом
            if (count($overlap_arr) == count($arr)) {
               return 1;
            }
        } 
?>
