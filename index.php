<?php
session_start();

require "config.php";
require "classes/Helper.php";
require "classes/Validation.php";
require "classes/Bootstrap.php";
require "classes/Controller.php";
require "classes/Model.php";

require "controllers/home.php";
require "controllers/users.php";
require "controllers/todos.php";

require "models/home.php";
require "models/user.php";
require "models/todos.php";


$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();//stvorimo klase od fajlova iz controllers fajla

//ako klasa u fajlu controllers postoji
if ($controller) {
	$controller->executeAction();
}
