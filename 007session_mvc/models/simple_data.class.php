<?php
class SimpleData
{
	const DATA_STR = "Name: %s,  Message %s <br>";
	protected $name;
	protected $message;
	public function __construct($name,$mes)
	{
		$this->name=$name;
		$this->message=$mes;
	}
	public function get_msg(): string
	{
		return sprintf(self::DATA_STR,$this->name,$this->message);
	}
}
