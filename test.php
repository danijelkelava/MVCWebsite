<?php
header('Content-Type: application/json');
$test = ["ime"=>"danijel", "prezime"=>"kelava"];
echo json_encode($test);