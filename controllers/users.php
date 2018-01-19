<?php 

class Users extends Controller{

	protected function register()
	{
		$viewmodel = new UserModel();
		$this->ReturnView($viewmodel->register(), true);
	}

	protected function login()
	{
		$viewmodel = new UserModel();
		$this->ReturnView($viewmodel->login(), true);
	}

	public function logout()
	{
		unset($_SESSION['is_logged']);
		unset($_SESSION['USER']);
		session_destroy();
		header('Location: ' . ROOT_PATH );
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