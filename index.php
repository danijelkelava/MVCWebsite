<?php

require "config.php";
require "classes/Bootstrap.php";
require "classes/Controller.php";
require "classes/Model.php";

require "controllers/home.php";
require "controllers/users.php";
require "controllers/shares.php";

require "models/home.php";
require "models/users.php";
require "models/share.php";

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();//stvorimo klase od fajlova iz controllers fajla

//ako klasa u fajlu controllers postoji
if ($controller) {
	$controller->executeAction();
}