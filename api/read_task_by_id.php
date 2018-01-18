<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require "tasks.php";

$task = new TaskModel();

$task->id = isset($_GET['id']) ? $_GET['id'] : die();
//echo $task->id;
$data = $task->readOneTask();

$data_arr = [["id"=>$task->id,
	         "naziv_taska"=>$task->naziv_taska,
	         "prioritet"=>$task->prioritet,
	         "rok"=>$task->rok,
	         "status"=>$task->status],
	         [["id"=>"low"], ["id"=>"normal"], ["id"=>"high"]],
	         [["id"=>"zavrseno"], ["id"=>"nije zavrseno"]]
            ];

echo json_encode($data_arr);