<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require "tasks.php";


$task = new TaskModel();

$data = json_decode(file_get_contents("php://input"));

$task->redirect($data);

$newDate = date_create($data->rok);
date_format($newDate,"Y/m/d");

$task->id = $data->id;
$task->naziv_taska = $data->naziv_taska;
$task->prioritet = $data->prioritet;
$task->rok = date_format($newDate,"Y/m/d");
$task->status = $data->status;

if($task->updateTask()){
   $message = "success";
   echo json_encode($message);
}else{
   $error = "error";
   echo json_encode($error);
}
