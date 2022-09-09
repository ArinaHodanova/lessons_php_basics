<?php
require_once("simple_data.class.php");
class CheckData extends SimpleData
{
	const DATA_STR = "<b>Name: %s,  Message %s </b> <br>";
	protected $important;
	public function __construct(string $name,string $mes,
		bool $important)
	{
		$this->name=$name;
		$this->message=$mes;
		$this->important=$important;
	}
	public function get_msg(): string
	{
		if($this->important) return sprintf(self::DATA_STR,$this->name,$this->message);
		return sprintf(SimpleData::DATA_STR,$this->name,$this->message);
	}
}
