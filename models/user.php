<?php

class UserModel extends Model{

	public function register()
	{
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        

        if ($post['register']) {
        	$this->query("SELECT * FROM korisnik WHERE email=:email");
			$this->bind(":email", $post['email']);

			$this->execute();

			if ($this->single() > 0) {
				$_SESSION['error'] = "Email already exists!";				
				return;
		    }else{
		    	//$password = md5($post['lozinka']);
		    	$password = password_hash($post['lozinka'], PASSWORD_DEFAULT);
		        $token = bin2hex(mt_rand(10,40000));

	            $this->query("INSERT INTO korisnik SET ime=:ime, prezime=:prezime, email=:email, lozinka=:lozinka, token=:token, active=0, datum_registracije=now()");

				$this->bind(":ime", $post['ime']);
				$this->bind(":prezime", $post['prezime']);
				$this->bind(":email", $post['email']);
				$this->bind(":lozinka", $password);
				$this->bind(":token", $token);
				
				$this->execute();

				if ($this->lastInsertId()) {
                	//$user = $this->getUser($post['email']);
				    //$_SESSION['id'] = $user['id'];
                	//$this->sendEmail($user['email'], $user['id'], $token);
                	$_SESSION['activate'] = "Check your email for activation link";
                	header('Location: ' . ROOT_PATH . 'users/login');
                }

				/*if ($this->lastInsertId()) {
					header('Location: ' . ROOT_PATH . 'users/login');
				}*/
		    }
        }

		return;	
	}

	public function login()
	{
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['lozinka']);
		if ($post['login']) {
			//die('login');
			$this->query("SELECT * FROM korisnik WHERE email=:email AND lozinka=:lozinka");

			$this->bind(":email", $post['email']);
			$this->bind(":lozinka", $password);

			$row = $this->single();

			if ($row) {
				$_SESSION['is_logged'] = true;
				$_SESSION['USER'] = [
					"id" => $row['id'],
					"ime" => $row['ime'],
					"prezime" => $row['prezime'],
					"email" => $row['email']
				];
				header('Location: ' . ROOT_PATH . 'todos');
			}else{
				echo "Incorrect login";
			}
		}
		return;
	}

	public function activate()
	{
		return;
	}

}