<?php

class Validation{

	private $passed;
	public static $errors = [];

	private function addError($item, $error){
		self::$errors[$item] = $error;
	}

	public function errors(){
		return $this->errors;
	}

	public function passed(){
		return $this->passed;
	}

	public function check($source, $items = [])
	{
		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {
				$value = trim($source[$item]);

				if ($rule === "required" && empty($value)) {
					switch ($item) {
						case 'ime':
						    $this->addError($item, "{$item} je obavezno polje!");
							break;
						case 'prezime':
							$this->addError($item, "{$item} je obavezno polje!");
							break;
						case 'email':
							$this->addError($item, "{$item} je obavezno polje!");
							break;
						case 'lozinka':
							$this->addError($item, "{$item} je obavezno polje!");
							break;						
						default:

							break;
					}
			    }elseif(!empty($value)){
		        	switch ($rule) {
		        		case 'min':
		        			if (strlen($value) < $rule_value) {
		        				$this->addError($item, "{$item} treba sadrzavati minimalno {$rule_value} znakova");
		        			}
		        			break;
		        		case 'max':
		        		    if (strlen($value) > $rule_value) {
		        				$this->addError($item, "{$item} moze sadrzavati maksimalno {$rule_value} znakova");
		        			}
		        		break;
		        		case 'text':
		        		    if (!preg_match("/^[a-zA-Z ]*$/", $value)) {
		        			$this->addError($item, "{$item} smije sadrzavati samo slova");
		        		    }
		        		break;
		        		case 'email':
		        		   if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)) {
						   $this->addError($item, "unesite valjan {$item}");
						   }
		        		default:		        			
		        			break;
		        	}
		        }				
			}			
		}
		if (empty(self::$errors)) {
			$this->passed = true;
		}
		return $this;
	}

}