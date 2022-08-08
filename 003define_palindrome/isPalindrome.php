<?php
//Дано число. Определить, является ли введенное число палиндромом. 
	function isPalindrome($num) 
	{

            $arr = str_split(strval($num));//преобразуем в массив
	    $z = count($arr);
	    for($i=0;$i<count($arr)/2;$i++)
	    {
		    if($arr[$i] != $arr[$z-$i-1]) return false;
		    //echo $arr[$i].PHP_EOL;
		    //echo $arr[$z-$i-1].PHP_EOL;
	    }
	    return true;
	}


	if(isPalindrome(1234)) echo "1234 - palindrome".PHP_EOL;
	if(isPalindrome(11)) echo "11 - palindrome".PHP_EOL;
	if(isPalindrome(121)) echo "121 - palindrome".PHP_EOL;
	isPalindrome(12345);
?>
