<?php 

class Helper{

	public static function order()
	{

		ShareModel::$order = ' ORDER BY create_date DESC';

		if (isset($_POST['type']) && $_POST['type'] == 'najstarije') {
	        ShareModel::$order = ' ORDER BY create_date ASC';       
		}elseif (isset($_POST['type']) && $_POST['type'] == 'po nazivu'){
			ShareModel::$order = ' ORDER BY title ASC';
		}
	}

}