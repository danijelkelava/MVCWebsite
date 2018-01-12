<?php

class Bootstrap{

	private $controller;
	private $action;
	private $request;

	public function __construct($request)
	{
		$this->request = $request;

		if ($this->request['controller'] == "") {
			$this->controller = "home";
		}else{
			$this->controller = $this->request['controller'];
		}

		if ($this->request['action'] == "") {
			$this->action = "index";// protected function Index u Home klasi
		}else{
			$this->action = $this->request['action'];
		}
	}

	public function createController()
	{
		if (class_exists($this->controller)) {
            //vrati klasu roditelja od dane klase, u ovom i svakom slucaju Controller
			$parents = class_parents($this->controller);

			if (in_array("Controller", $parents)) {

				if (method_exists($this->controller, $this->action)) {
					return new $this->controller($this->action, $this->request);
				}else{
					echo "Method does not exists!";
					return;
				}

			}else{
				echo "Base controller not found!";
				return;
			}
			
		}else{
			echo "Controller class does not exists!";
			return;
		}
	}
}