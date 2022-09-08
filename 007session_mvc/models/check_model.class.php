<?php
require_once("simple_model.class.php");
require_once("models/check_data.class.php");
class CheckModel extends SimpleModel 
{
	protected $important_cont=[];
	public function add_msg()
	{
		if (isset($_POST['name']) &&isset($_POST['msg']))
		{
			$b = isset($_POST['important']);
			$a = new CheckData($_POST['name'], $_POST['msg'], $b);
			$this->cont[]= $a;
			if($b)
			{
				$this->important_cont[]= $a;
			}	
		}
	}
	public function get_msgs(): array
	{
		return $this->cont;
	}
	public function get_important_msgs(): array
	{
		return $this->important_cont;
	}
}
?>

