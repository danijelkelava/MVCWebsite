<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require "tasks.php";

$tasks = new TaskModel();
$tasks->todoID = isset($_GET['id']) ? $_GET['id'] : die();
//$tasks->redirect($tasks->todoID);

//$task->order = $data->order;
$data = $tasks->getTasksById();

echo json_encode($data);