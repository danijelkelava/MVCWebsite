<?php

class Validation{

	public function __construct()
	{
		echo "im working";
		return;
	}

	public function check($source, $items = [])
	{
		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {
				var_dump($rule);
			}
		}
		die();
	}
}