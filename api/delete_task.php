<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
require "tasks.php";

$tasks = new TaskModel();

$data = json_decode(file_get_contents("php://input"));

$tasks->id = $data->id;

if($tasks->deleteTask()){
    $message = "success";
    echo json_encode($message);
}else{
   $error = "error";
   echo json_encode($error);
}