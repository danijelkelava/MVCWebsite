<?php

abstract class Controller{
	
	protected $request;
	protected $action;

	public function __construct($action, $request)
	{
		$this->action = $action;
		$this->request = $request;
	}

	public function executeAction()
	{
		return $this->{$this->action}();//ako action = "" onda je to index, $this->index()
	}

	protected function ReturnView($viewmodel, $fullview)
	{
		$view = 'views/' . get_class($this) . '/' . $this->action . '.php';
		if ($fullview) {
			//require 'views/main.php';
			echo "hi";
		}else{
			require $view;
		}
	}
}