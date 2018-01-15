<?php 

class Helper{

	public static function htmlout($param)
	{
		echo htmlspecialchars($param, ENT_QUOTES, 'UTF-8');
	}

	public static function dateFormat($date)
	{
		$newDate = date_create($date);
		echo date_format($newDate,"Y/m/d");
	}

}