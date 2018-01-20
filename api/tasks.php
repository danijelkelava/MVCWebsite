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
		try{
	        $this->query("INSERT INTO task (naziv_taska, prioritet, rok, todoID)
		                  VALUES (:naziv_taska, :prioritet, :rok, :todoID)");
			$this->bind(":naziv_taska", $this->naziv_taska);
		    $this->bind(":prioritet", $this->prioritet);
		    $this->bind(":rok", $this->rok);
		    $this->bind(":todoID", $this->todoID);
		    $this->execute();
		}catch(Exception $e){
			$_SESSION['error'] = "Database connection error: " . $e->getMessage();
	        return;
		}
		

	}

	public function updateTask()
	{
		try{
	        $this->query("UPDATE task SET naziv_taska=:naziv_taska,
				                          prioritet=:prioritet,
				                          rok=:rok,
				                          status=:status
				          WHERE id=:taskID");
			$this->bind(":naziv_taska", $this->naziv_taska);
		    $this->bind(":prioritet", $this->prioritet);
		    $this->bind(":rok", $this->rok);
		    $this->bind(":status", $this->status);
		    $this->bind(":taskID", $this->id);
		    $this->execute();
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

	public function readOneTask()
	{
		try{
			$this->query("SELECT * FROM task WHERE id =" . $this->id);
			$row = $this->single();
		}catch(Exception $e){
			$_SESSION['error'] = "Database connection error: " . $e->getMessage();
	        return;
		}
		if ($row) {
			$this->id = $row['id'];
			$this->naziv_taska = $row['naziv_taska'];
			$this->prioritet = $row['prioritet'];
			$this->rok = $row['rok'];
			$this->status = $row['status'];
			$this->todoID = $row['todoID'];
		}
		
	}

	public function todoInfo()
	{
		try{
	        $this->query("SELECT status, COUNT(*) as total, (SELECT COUNT(*) FROM task WHERE status='nije zavrseno' AND todoID=:todoID) as nedovrseno,
				       ((SELECT COUNT(*) FROM task WHERE status='zavrseno' AND todoID=:todoID)*100/COUNT(*)) as dovrseno FROM task WHERE todoID=:todoID");
			$this->bind(":todoID", $this->todoID);
			$row = $this->single();
			return $row;
		}catch(Exception $e){
			$_SESSION['error'] = "Database connection error: " . $e->getMessage();
	        return;
		}		
	}
}
