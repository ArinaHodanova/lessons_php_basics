<?php
require_once("abstract_view.class.php");
class SimpleView extends AbstractView 
{
	const ACTION_MSG ="HELLO THERE %s";
	const POST_MSG =<<<_END
<form action="index.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="msg"><br>
<input type="submit">
</form> SimpleView::ACTION_MSG this %s <br>

_END;
	const LINKS =<<<_END
<a href="%s">add msg</a>
<a href="%s">show msg</a>

_END;
	const LINK_ADD_MSG = "index.php";
	public function add_msg()
	{
		echo sprintf(self::POST_MSG,self::LINK_ADD_MSG);
	}
	public function links() 
	{
		echo sprintf(self::LINKS, self::LINK_ADD_MSG, self::LINK_ADD_MSG);
	}
}
$a = new SimpleView();
//$a->add_msg();
//$a->links();
?>
