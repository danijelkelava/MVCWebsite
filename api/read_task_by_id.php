<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require "tasks.php";

$task = new TaskModel();

$task->id = isset($_GET['taskid']) ? $_GET['taskid'] : die();
//echo $task->id;
$data = $task->readOneTask();

$data_arr = ["id"=>$task->id,
	         "naziv_taska"=>$task->naziv_taska,
	         "prioritet"=>$task->prioritet,
	         "rok"=>$task->rok,
	         "status"=>$task->status
            ];

echo json_encode($data_arr);