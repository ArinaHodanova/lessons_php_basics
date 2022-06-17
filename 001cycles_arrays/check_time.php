<?php
//echo "hello";
include_once "create_random.php";
function check_time($repeet_time,$func) 
{
	$t1 = microtime(true); 
	for($i=0; $i<$repeet_time; $i++)
	{
		$func();
	}
	$t2 = microtime(true); 
	$t1=$t2-$t1;
	return $t1;
}
function he()
{
	echo "hello".PHP_EOL;
}
function he1()
{
	addsUniqueNumberArray(70,0,100);
}
echo check_time(10000,"he1");
echo PHP_EOL;
?>
