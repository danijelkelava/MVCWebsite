<?php 

class Todos extends Controller{
	
	protected function Index()
	{
		$this->redirect();

		$viewmodel = new TodoModel();		
		
        $viewmodel->order = ' ORDER BY datum_izrade DESC';

		if (isset($_POST['type']) && $_POST['type'] == 'najstarije') {
	        $viewmodel->order = ' ORDER BY datum_izrade ASC';       
		}elseif (isset($_POST['type']) && $_POST['type'] == 'po nazivu'){
			$viewmodel->order = ' ORDER BY naziv_liste ASC';
		}

        if (isset($_POST['delete_todo_listu'])) {
		   $viewmodel->delete();
		}
		
		$this->ReturnView($viewmodel->Index(), true);

		
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
		$this->ReturnView($viewmodel->update(), true);
	}

}