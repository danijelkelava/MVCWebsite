<?php

class UserModel extends Model{

	public function register()
	{
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['lozinka']);
		if ($post['register']) {
			//die('register');
			$this->query("INSERT INTO korisnik (ime, prezime, email, lozinka, datum_registracije, active)
				VALUES(:ime, :prezime, :email, :lozinka, now(), 0)");
			$this->bind(":ime", $post['ime']);
			$this->bind(":prezime", $post['prezime']);
			$this->bind(":email", $post['email']);
			$this->bind(":lozinka", $password);

			$this->execute();

			if ($this->lastInsertId()) {
				header('Location: ' . ROOT_PATH . 'users/login');
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

}