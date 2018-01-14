
<div class="container-fluid">          
  <h1 class="display-6">Create Todo</h1>         
</div>
<div class="container">
  <div class="row">
    <div class="col">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

      <div class="form-group">
        <label for="title">Ime liste</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="" placeholder="Unesite ime">
      </div>

      <div class="form-group">
        <label for="body">Sadrzaj</label>
        <textarea type="text" class="form-control" id="body" name="body" aria-describedby="" placeholder="Body"></textarea>
      </div>

      <div class="form-group">
        <label for="link">Link</label>
        <textarea type="text" class="form-control" id="link" name="link" aria-describedby="" placeholder="Link"></textarea>
      </div>
      <input type="submit" class="btn btn-primary" name="create_share" value="Dodaj listu">
      <a class="btn btn-primary" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
    </form>
    </div>
  </div>
</div>