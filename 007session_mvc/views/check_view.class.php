<?php
require_once("simple_view.class.php");
class CheckView extends SimpleView
{
	const POST_MSG =<<<_END
<form action="%s" method="post">
Name: <input type="text" name="name"><br>
Message: <input tlype="text" name="msg"><br>
<input type="checkbox" name="important" id="agree">
<label for="important">I agree</label>
<input type="submit">
</form> <br>

_END;
	public function __construct($model)
	{
		$this->model=$model;
	}
	public function add_msg()
	{
		echo sprintf(CheckView::POST_MSG,self::LINK_ADD_MSG);
	}
	public function show_important_msg()
	{
		foreach($this->model->get_important_msgs() as $msg)
		{
			echo $msg->get_msg();
		}
	}
}

