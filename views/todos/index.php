
<div class="card">
  <div class="card-body">
    <h1 class="card-title">Todo List</h1>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a class="btn btn-primary" href="/todos/add">Add Todo</a>
  </div>
</div>
<form class="form-inline" method="post">
	<fieldset class="form-group">
		<label for="type">Sortiraj po:</label>
		<select name="type" onchange='this.form.submit()'; required>
		  <option value="najnovije">Najnovije</option>
			<option value="najstarije" <?php if (isset($_POST['type']) && $_POST['type'] == 'najstarije') {echo 'selected';}?>>Najstarije</option>
			<option value="po nazivu" <?php if (isset($_POST['type']) && $_POST['type'] == 'po nazivu') {echo 'selected';}?>>Po nazivu</option>			
		</select>
	</fieldset>	
</form>
<div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Ime Liste/Idi na Listu</th>
      <th scope="col">Datum Izrade</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
	
	<?php foreach($viewmodel as $todo_lista) : ?>
    <tr>
    <td>
      <a href="/todos/tasks/<?php Helper::htmlout($todo_lista['id']);?>"><?php Helper::htmlout($todo_lista['naziv_liste']);?></a>
    </td>
    <td>
      <p><?php Helper::dateFormat($todo_lista['datum_izrade']);?></p>
    </td>
    <td>
      <a class="btn btn-info" href="/todos/update/<?php Helper::htmlout($todo_lista['id']);?>">update</a>
    </td>
    <td>
      <form method="post">
        <div class="form-group">
          <input class="btn btn-danger" type="submit" name="delete_todo_listu" value="delete">
        </div>
        <input type="hidden" name="todo_id" value="<?php Helper::htmlout($todo_lista['id']);?>"> 
      </form>
    </td> 
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
</div>
