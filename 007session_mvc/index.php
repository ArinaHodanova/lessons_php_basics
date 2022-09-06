<?php
require_once("views/abs_view.php");
session_start();
$_SESSION["view"]= new SimpleView();
?>
<html>
<body>
<?php
if (isset($_POST['name']) &&isset($_POST['msg']))
{
	$_SESSION["msg"][]=[$_POST['name'], $_POST['msg']];
	echo "set ".PHP_EOL;
	print_r($_SESSION["msg"]);
         }
$_SESSION["view"]->add_msg();
     ?>


</body>
</html>
