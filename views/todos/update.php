<?php 
var_dump($_GET['id']); 
/*$todo = new TodoModel();
$todoById = $todo->getTodoById($_GET['id']);*/
?>
<div class="card">
  <div class="card-header">
    <h1>Update Todo Form</h1>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

      <div class="form-group">
        <label for="naziv_liste">Ime liste</label>
        <input type="text" class="form-control" id="naziv_liste" name="naziv_liste" value="<?php Helper::htmlout($viewmodel['naziv_liste']);?>" aria-describedby="" placeholder="Todo Name">
      </div>
      <input type="" name="todo_id" value="<?php Helper::htmlout($_GET['id']);?>">
      <input type="submit" class="btn btn-primary" name="update_todo" value="Update Todo">
      <a class="btn btn-primary" href="<?php echo ROOT_PATH; ?>todos">Cancel</a>
    </form>
    </div>
  </div>
</div>

