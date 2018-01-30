<?php 

class Users extends Controller{

	protected function register()
	{
        
        $viewmodel = new UserModel();

		if (Helper::inputExists()) {
			$validation = new Validation();
			$validation->check($_POST, [
				"ime"=>["required"=>true, "min"=>2, "max"=>30, "text"=>true],
				"prezime"=>["required"=>true, "min"=>2, "max"=>30, "text"=>true],
				"email"=>["required"=>true, "email"=>true],
				"lozinka"=>["required"=>true, "min"=>6]
			]);

			if ($validation->passed()) {
				$viewmodel->setPass(true);
			}
		}
		
		$this->ReturnView($viewmodel->register(), true);
		
	}

	protected function login()
	{
		$viewmodel = new UserModel();

		if (Helper::inputExists()) {
			$validation = new Validation();
			$validation->check($_POST, [
				"email"=>["required"=>true, "email"=>true],
				"lozinka"=>["required"=>true, "min"=>6]
			]);

			if ($validation->passed()) {
				$viewmodel->setPass(true);
			}
		}

		$this->ReturnView($viewmodel->login(), true);
	}

	public function logout()
	{   
		unset($_SESSION['is_logged']);
		unset($_SESSION['USER']);
		session_destroy();
		header('Location: ' . ROOT_PATH . 'users/login');
	}

	public function activate()
	{
		$viewmodel = new UserModel();

		if (isset($_GET['active']) && isset($_GET['id'])) {
		 	$viewmodel->tk = $_GET['active'];
		    $viewmodel->id = $_GET['id'];
		 } 
		
        $this->ReturnView($viewmodel->activate(), true);
        		
	}
	
}