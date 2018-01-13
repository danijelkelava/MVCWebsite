
<div class="container-fluid jumbotron">          
  <h1 class="display-5">Create Todo</h1>
  <hr class="my-4">           
</div>
<div class="container">
  <div class="row">
    <div class="col">
    <form method="post">

      <div class="form-group">
        <label for="title">Ime liste</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="" placeholder="Unesite ime">
      </div>

      <div class="form-group">
        <label for="body">Sadrzaj</label>
        <textarea type="text" class="form-control" id="body" name="body" aria-describedby="" placeholder="Body"></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="create_share">Dodaj listu</button>
      <a class="btn btn-primary" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
    </form>
    </div>
  </div>
</div>