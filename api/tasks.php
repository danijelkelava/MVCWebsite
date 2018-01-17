<?php

require "../config.php";
require "../classes/Model.php";

class TaskModel extends Model{

	public $todoID;
	public $id;

	public function getTasksById()
	{
		try{
	        $this->query("SELECT todo.id as todoid, task.id as taskid, prioritet, rok, status, 
		    naziv_taska, DATEDIFF(rok, CURDATE()) as datediff FROM todo left OUTER JOIN task 
		    ON todoID=todo.id WHERE todo.id=:todoID");
			$this->bind(":todoID", $this->todoID);
			$rows = $this->resultSet();
			return $rows;
		}catch(Exception $e){
			$_SESSION['error'] = "Database connection error: " . $e->getMessage();
	        return;
		}
		
	}

	public function deleteTasK()
	{
		try{
	        $this->query("DELETE FROM task WHERE id=:id");
			$this->bind(":id", $this->id);
			$this->execute();
		}catch(Exception $e){
			$_SESSION['error'] = "Database connection error: " . $e->getMessage();
	        return;
		}
		
	}
}
