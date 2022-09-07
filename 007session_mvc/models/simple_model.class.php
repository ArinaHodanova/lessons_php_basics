<?php
require_once("simple_data.class.php");
class SimpleModel
{
	protected $cont=[];
	public function add_msg()
	{
		if (isset($_POST['name']) &&isset($_POST['msg']))
		{
			$this->cont[]= new SimpleData($_POST['name'], $_POST['msg']);
		}
	}
	public function get_msgs(): array
	{
		return $this->cont;
	}
}
?>

