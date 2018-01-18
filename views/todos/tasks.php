<div class="card">
  <div class="card-header">
    <h1 id="todo" data-id="<?php Helper::htmlout($_GET['id']);?>">Todo</h1>
  </div>
</div>
<div>
  <form id="create-task-form" class="bg-info table form-inline" method="post">
    <fieldset class="form-group">
    <label for="naziv_taska">IME ZADATKA:</label>
    <input type="text" class="form-control" id="naziv_taska" name="naziv_taska" placeholder="Ime zadatka" value="" required>
    </fieldset>

    <fieldset class="form-group">
    <label for="prioritet">PRIORITET:</label>
    <select id="prioritet" name="prioritet">
      <option value="low">low</option>
      <option value="normal">normal</option>
      <option value="high">high</option>
    </select>
    </fieldset>

    <fieldset class="form-group">
    <label for="rok">ROK:</label>
    <input type="date" class="form-control" id="rok" name="rok" placeholder="MM/DD/YYY" value="">
    </fieldset>
      <input type="" name="todoID" value="<?php Helper::htmlout($_GET['id']); ?>">
    <button class="create-task btn btn-default" type="submit" name="create_task" role="button">Kreiraj task</button> 
    </form> 
</div>
<div class="container">
  <div class="row">
    <div class="col">
    <div id="test">
    	
    </div>
    <div id="test2">
      
    </div>
    </div>
  </div>
</div>