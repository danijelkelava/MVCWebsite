<?php

require "../config.php";
require "../classes/Model.php";
require "../classes/Helper.php";

class TaskModel extends Model{

	
	public $id;
	public $naziv_taska;
	public $prioritet;
	public $rok;
	public $status;
    public $todoID;

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

	public function createTask()
	{
		$this->query("INSERT INTO task (naziv_taska, prioritet, rok, todoID)
	                  VALUES (:naziv_taska, :prioritet, :rok, :todoID)");
		$this->bind(":naziv_taska", $this->naziv_taska);
	    $this->bind(":prioritet", $this->prioritet);
	    $this->bind(":rok", $this->rok);
	    $this->bind(":todoID", $this->todoID);
	    $this->execute();

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
