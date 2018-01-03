<?php

require "config.php";
require "classes/Bootstrap.php";
require "classes/Controller.php";
require "controllers/home.php";
require "controllers/users.php";
require "controllers/shares.php";

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();

if ($controller) {
	$controller->executeAction();
}