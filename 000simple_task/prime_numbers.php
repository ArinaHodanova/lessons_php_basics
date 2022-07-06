<?php
echo "hello";
function searchPrimeNumbers(int $lenght=9)
{
	$prime_numbers = [1,2];
	for($i=3;$i<=$lenght;$i++)
	{
		$prime = true;
		for($k=2;$k<$i;$k++) {
			if(is_int($i/$k) )
			{
				$prime = false;
				break;
			}
		}
		echo $i."  ".$k.PHP_EOL;
		if($prime)
		{
			$prime_numbers[] = $i;
		}
	}
	print_r($prime_numbers);
}
searchPrimeNumbers(17);
?>

