<?php

class TodoModel extends Model{

    public $order;
    private $table_name = "todo";

    public function order()
    {
		$this->order = ' ORDER BY datum_izrade DESC';

		if (isset($_POST['type']) && $_POST['type'] == 'najstarije') {
	        $this->$order = ' ORDER BY datum_izrade ASC';       
		}elseif (isset($_POST['type']) && $_POST['type'] == 'po nazivu'){
			$this->$order = ' ORDER BY naziv_liste ASC';
		}
	}

	public function Index()
	{
		$this->query('SELECT * FROM todo ' . $this->order);
		$rows = $this->resultSet();
		return $rows;
	}

	public function getTodoById($id)
	{
		$this->query("SELECT * FROM " . $this->table_name . " WHERE id=:id");
		$this->bind(":id", $id);
		$todo = $this->single();
		return $todo;
	}

	public function add()
	{
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if ($post['create_todo']) {
			$this->query("INSERT INTO todo (naziv_liste, datum_izrade, IDkorisnika)
				VALUES(:naziv_liste, now(), :IDkorisnika)");
			$this->bind(":naziv_liste", $post['naziv_liste']);
			$this->bind(":IDkorisnika", 8);
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
			//die('this works');
			$this->query("DELETE FROM " . $this->table_name . " WHERE id=:id");
			$this->bind(":id", $post['todo_id']);
			$this->execute();
	    }
	    //header('Location: ' . ROOT_PATH . 'todos');
	}
		
}