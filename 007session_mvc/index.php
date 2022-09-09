<?php
require_once("views/check_view.class.php");
require_once("models/check_model.class.php");
session_start();
if(!isset($_SESSION["view"]))
{
	$model=new CheckModel();
	$_SESSION["view"]= new CheckView($model);
}
?>
<html>
<body>
<?php
$_SESSION["view"]->model->add_msg();
$_SESSION["view"]->show_important_msg();
$_SESSION["view"]->show_msg();
$_SESSION["view"]->add_msg();
$_SESSION["view"]->links();
     ?>


</body>
</html>
