<?php
require_once("views/simple_view.class.php");
require_once("models/simple_model.class.php");
session_start();
if(!isset($_SESSION["view"]))
{
	$model=new SimpleModel();
	$_SESSION["view"]= new SimpleView($model);
}
?>
<html>
<body>
<?php
/*
if (isset($_POST['name']) &&isset($_POST['msg']))
{
	$_SESSION["msg"][]=[$_POST['name'], $_POST['msg']];
	echo "set ".PHP_EOL;
	print_r($_SESSION["msg"]);
         }
 */
$_SESSION["view"]->model->add_msg();
$_SESSION["view"]->show_msg();
$_SESSION["view"]->add_msg();
$_SESSION["view"]->links();
     ?>


</body>
</html>
