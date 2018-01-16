<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require "../config.php";
require "../classes/Model.php";

class TaskModel extends Model{

	public $todoID;

	public function getTasksById()
	{
		$this->query("SELECT * FROM task WHERE todoID=:todoID");
		$this->bind(":todoID", $this->todoID);
		$rows = $this->resultSet();
		return $rows;
	}
}

$tasks = new TaskModel();
$tasks->todoID = isset($_GET['id']) ? $_GET['id'] : die();
$data = $tasks->getTasksById();

echo json_encode($data);