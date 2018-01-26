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

	public static function setMessage($text, $type)
	{
		if ($type == "error") {
			$_SESSION['ERROR_MSG'] = $text;
		}elseif($type == "success"){
			$_SESSION['SUCCESS_MSG'] = $text;
		}
		/*
		switch ($type) {
			case 'error':
				$_SESSION['ERROR_MSG'] = $text;
				break;
			
			default:
				$_SESSION['SUCCESS_MSG'] = $text;
				break;
		}*/
	}

	public static function writeMessage()
	{
		if (isset($_SESSION['ERROR_MSG'])) {
			echo "<div class='alert alert-danger'>" . $_SESSION['ERROR_MSG'] . "</div>";
			unset($_SESSION['ERROR_MSG']);
		}

		if (isset($_SESSION['SUCCESS_MSG'])) {
			echo "<div class='alert alert-success'>" . $_SESSION['SUCCESS_MSG'] . "</div>";
			unset($_SESSION['SUCCESS_MSG']);
		}
	}
}