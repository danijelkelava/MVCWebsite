<?php

class ShareModel extends Model{

    public static $order;

    public static function order()
    {
		self::$order = ' ORDER BY create_date DESC';

		if (isset($_POST['type']) && $_POST['type'] == 'najstarije') {
	        self::$order = ' ORDER BY create_date ASC';       
		}elseif (isset($_POST['type']) && $_POST['type'] == 'po nazivu'){
			self::$order = ' ORDER BY title ASC';
		}
	}

	public function Index()
	{
		$this->query('SELECT * FROM shares ' . self::$order);
		$rows = $this->resultSet();
		return $rows;
	}

	public function add()
	{
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if ($post['create_share']) {
			$this->query("INSERT INTO shares (title, body, link, user_id)
				VALUES(:title, :body, :link, :user_id)");
			$this->bind(":title", $post['title']);
			$this->bind(":body", $post['body']);
			$this->bind(":link", $post['link']);
			$this->bind(":user_id", 1);

			$this->execute();

			if ($this->lastInsertId()) {
				header('Location: ' . ROOT_PATH . 'shares');
			}
		}
		return;
	}
}