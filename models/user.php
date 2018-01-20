<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class UserModel extends Model{

	public $id;
	public $tk;

	public function register()
	{
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
       
        if ($post['register']) {
        	$this->query("SELECT * FROM korisnik WHERE email=:email");
			$this->bind(":email", $post['email']);

			//$this->execute();

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
                	$user = $this->getUser($post['email']);
				    $_SESSION['id'] = $user['id'];
                	$this->sendEmail($user['email'], $user['id'], $token);
                	$_SESSION['activate'] = "Check your email for activation link.";
                	header('Location: ' . ROOT_PATH . 'users/login');
                }

		    }
        }

		return;	
	}

	private function getUser($email){
		try{
	        $this->query("SELECT * FROM korisnik WHERE email='$email'");
			$row = $this->single();
			return $row;
		}catch(Exception $e){
            $_SESSION['error'] = "Database connection error: " . $e->getMessage();
	        return;
		}
		
	}

	public function sendEmail($email, $id, $token){

        $link = $_SERVER['HTTP_HOST'] . '/users/activate/'.$id.'/'.$token;
        
		$mail = new PHPMailer(true);                           // Passing `true` enables exceptions
		try {
	    //Server settings
		$mail->SMTPOptions = array(
		    'ssl' => array(
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		        'allow_self_signed' => true
		    )
		);
	    $mail->SMTPDebug;                                 // Enable verbose debug output
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = 'dykyprod@gmail.com';                 // SMTP username
	    $mail->Password = 'danijel5';                           // SMTP password
	    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom('from@example.com', 'Mailer');
	    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
	    $mail->addAddress('ellen@example.com');               // Name is optional
	    $mail->addReplyTo('info@example.com', 'Information');
	    $mail->addCC('cc@example.com');
	    $mail->addBCC('bcc@example.com');

	    //Attachments
	    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Here is the subject';
	    $message = '<div>';
	    $message .= '<h6>Your activation code</h6>';
	    $message .= '<h3>'.$token.'</h3>';
	    $message .= '<h1>OR</h1>';
	    // get varijabla active u url-u activate.php?active kojom cemo dohvatiti $token
	    $message .= '<a href="' . $link . '">Activate account</a>';
	    $message .= '</div>';

		$mail->Body = $message;
	    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	    
	    $mail->addAddress($email, 'Novi korisnik');
	    $mail->send();
	    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
    }

	public function login()
	{
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if ($post['login']) {

			unset($_SESSION['activate']);
			unset($_SESSION['error_login']);
			$this->query("SELECT * FROM korisnik WHERE email=:email AND active=1");
			$this->bind(":email", $post['email']);

			$row = $this->single();

			if (isset($row)) {
				$this->query("SELECT * FROM korisnik WHERE id='" . $row['id'] . "' ");

				$row = $this->single();

				if ($post['email'] != $row['email']) {
					$_SESSION['error_login'] = "Incorrect email!";
					return;
				}

				if (password_verify($post['lozinka'], $row['lozinka'])) {
                    $this->updateLoginTime($row['id']);
					$_SESSION['is_logged'] = true;
				    $_SESSION['USER'] = [
					"ID" => $row['id'],
					"IME" => $row['ime'],
					"PREZIME" => $row['prezime'],
					"EMAIL" => $row['email'],
					"LOGIN_DATE"=>$row['zadnji_login']
					];
					header('Location: ' . ROOT_PATH . 'home');
					
				}else{
					$_SESSION['error_login'] = "Incorrect password!";
				}
		    }
		}			
		return;
	}

	public function activate()
	{
	    try{
	        $this->query("UPDATE korisnik SET active=1 WHERE id=:id AND token=:token");
			$this->bind(":id", $this->id);
			$this->bind(":token", $this->tk);
			$this->execute();
			unset($_SESSION['activate']);
			$_SESSION['activate'] = "Now you can log in.";
			header('Location: ' . ROOT_PATH . 'users/login');
	    }catch(Exception $e){
	    	$_SESSION['error'] = "Database connection error: " . $e->getMessage();
	        return;
	    }			
	}

	private function updateLoginTime($id)
	{
		try{
	        $this->query("UPDATE korisnik SET zadnji_login=now() WHERE id='$id'");
			$this->execute();
	    }catch(Exception $e){
	    	$_SESSION['error'] = "Database connection error: " . $e->getMessage();
	        return;
	    }
		
	}
}