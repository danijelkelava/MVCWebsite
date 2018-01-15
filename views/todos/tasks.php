<div class="card">
  <div class="card-header">
    <h1>Todo </h1>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

      <div class="form-group">
        <label for="naziv_liste">Ime liste</label>
        <input type="text" class="form-control" id="naziv_liste" name="naziv_liste" aria-describedby="" placeholder="Todo Name">
      </div>
      <input type="hidden" name="IDkorisnika" value="<?php Helper::htmlout($_SESSION['USER']['id']);?>">
      <input type="submit" class="btn btn-primary" name="create_todo" value="Add Todo">
      <a class="btn btn-primary" href="<?php echo ROOT_PATH; ?>todos">Cancel</a>
    </form>
    </div>
  </div>
</div>