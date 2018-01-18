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

    public function redirect($var)
	{
		if (!isset($var)) {
			header("Location: " . ROOT_PATH . "users/login");
		}
	}

	public function getTasksById()
	{
		try{
	        $this->query("SELECT task.id as taskid, prioritet, rok, status, 
		    naziv_taska, DATEDIFF(rok, CURDATE()) as datediff FROM todo left OUTER JOIN task 
		    ON todoID=todo.id WHERE todo.id=:todoID");
			$this->bind(":todoID", $this->todoID);
			$rows = $this->resultSet();
			return $rows;
		}catch(Exception $e){
			$_SESSION['error'] = "Database connection error: " . $e->getMessage();
	        return;
		}
		if (!isset($rows)) {
			echo json_encode('[{}]');
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

	public function updateTask()
	{
		$this->query("UPDATE task SET naziv_taska=:naziv_taska,
			                          prioritet=:prioritet,
			                          rok=:rok
			          WHERE id=:taskID");
		$this->bind(":naziv_taska", $this->naziv_taska);
	    $this->bind(":prioritet", $this->prioritet);
	    $this->bind(":rok", $this->rok);
	    $this->bind(":taskID", $this->id);
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

	public function readOneTask()
	{
		return;
	}
}
