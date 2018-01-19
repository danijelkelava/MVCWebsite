<?php 

class Todos extends Controller{
	
	protected function Index()
	{
		$this->redirect();

		$viewmodel = new TodoModel();		
		
        $viewmodel->order(' ORDER BY datum_izrade DESC');

		if (isset($_POST['type']) && $_POST['type'] == 'najstarije') {
	        $viewmodel->order(' ORDER BY datum_izrade ASC');       
		}elseif (isset($_POST['type']) && $_POST['type'] == 'po nazivu'){
			$viewmodel->order(' ORDER BY naziv_liste ASC');
		}

        if (isset($_POST['delete_todo_listu'])) {
		   $viewmodel->delete();
		}
		$id = $_SESSION['USER']['ID'];
		$this->ReturnView($viewmodel->Index($id), true);

		
	}

	protected function add()
	{
		$this->redirect();

		$viewmodel = new TodoModel();
		$this->ReturnView($viewmodel->add(), true);
	}

	protected function update()
	{
		$this->redirect();
		
		$viewmodel = new TodoModel();
		$this->ReturnView($viewmodel->update($_GET['id']), true);
		
	}

	protected function tasks()
	{
		$this->redirect();

		$viewmodel = new TodoModel();
		$this->ReturnView($viewmodel->tasks(), true);
	}

}