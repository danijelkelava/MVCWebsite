<?php 

class Users extends Controller{

	protected function register()
	{
		$viewmodel = new UserModel();
		$this->ReturnView($viewmodel->register(), true);
	}
	
}