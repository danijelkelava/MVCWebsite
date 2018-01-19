<?php

class TodoModel extends Model{

    private $order;
    private $table_name = "todo";
    public $todoID;

    public function order($order)
    {
		$this->order = $order;
	}

	public function Index($id)
	{
		$this->query("SELECT * FROM " . $this->table_name 
			                          . " WHERE IDkorisnika=:id"
			                          . $this->order);
		$this->bind(":id", $id);
		$rows = $this->resultSet();
		return $rows;
	}

	public function add()
	{
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if ($post['create_todo']) {
			$this->query("INSERT INTO todo (naziv_liste, datum_izrade, IDkorisnika)
				VALUES(:naziv_liste, now(), :IDkorisnika)");
			$this->bind(":naziv_liste", $post['naziv_liste']);
			$this->bind(":IDkorisnika", $post['IDkorisnika']);
			$this->execute();

			if ($this->lastInsertId()) {
				header('Location: ' . ROOT_PATH . 'todos');
			}
		}
		return;
	}

	public function update($id)
	{
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if ($post['update_todo']) {
			//var_dump($post);
			//die("update");
			$this->query("UPDATE " . $this->table_name . " SET naziv_liste=:naziv_liste WHERE id=:id");
			$this->bind(":naziv_liste", $post['naziv_liste']);
			$this->bind(":id", $post['todo_id']);
			$this->execute();

			header('Location: ' . ROOT_PATH . 'todos');
			return;
		}
		
		$this->query("SELECT * FROM " . $this->table_name . " WHERE id=:id");
		$this->bind(":id", $id);
		$row = $this->single();
		return $row;
	}

	public function delete()
	{
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if ($post['delete_todo_listu']) {

			$this->query("DELETE FROM " . $this->table_name . " WHERE id=:id");
			$this->bind(":id", $post['todo_id']);
			$this->execute();
	    }
	    return;
	}

	public function tasks(){
    	$this->query("SELECT id, naziv_liste, datum_izrade FROM todo WHERE id=:id");
    	$this->bind(":id", $this->todoID);
		$row = $this->single();
    	return $row;
    }
		
}