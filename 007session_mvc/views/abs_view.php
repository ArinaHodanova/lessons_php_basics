<?php
$thn = SimpleView::ACTION_MSG;
$POST_MSG =<<<_END
<form action="index.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="msg"><br>
<input type="submit">
</form> SimpleView::ACTION_MSG this "$thn"

_END;
class SimpleView
{
	const ACTION_MSG ="HELLO THERE";
	public function add_msg()
	{
		global $POST_MSG;
		echo $POST_MSG;
	}
}
//$a = new SimpleView();
//$a->add_msg();
?>
