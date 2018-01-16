<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require "../config.php";
require "../classes/Model.php";

class TaskModel extends Model{

	public function tasksById()
	{
		$this->query("SELECT * FROM task WHERE todoID=:todoID");
		$this->bind(":todoID", 32);
		$rows = $this->resultSet();
		return $rows;
	}
}

$tasks = new TaskModel();
$data = $tasks->tasksById();

echo json_encode($data);
