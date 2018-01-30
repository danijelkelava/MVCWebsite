<div class="card">
  <div class="card-header">
    <h1>User Register</h1>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

      <div class="form-group">
        <label for="ime">First Name</label>
        <input type="text" class="form-control" id="ime" name="ime" aria-describedby="" placeholder="Unesite ime" value="<?php echo Helper::get('ime'); ?>">
        <p class="text-danger"><?php if(isset(Validation::$errors['ime'])){ echo Validation::$errors['ime']; } ?></p>
      </div>

      <div class="form-group">
        <label for="prezime">Last Name</label>
        <input type="text" class="form-control" id="prezime" name="prezime" aria-describedby="" placeholder="Unesite prezime" value="<?php echo Helper::get('prezime'); ?>">
        <p class="text-danger"><?php if(isset(Validation::$errors['prezime'])){ echo Validation::$errors['prezime']; } ?></p>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" aria-describedby="" placeholder="Email" value="<?php echo Helper::get('email'); ?>">
        <p class="text-danger"><?php if(isset(Validation::$errors['email'])){ echo Validation::$errors['email']; } ?></p>
      </div>

      <div class="form-group">
        <label for="lozinka">Password</label>
        <input type="password" class="form-control" id="lozinka" name="lozinka" aria-describedby="" placeholder="Password">
        <p class="text-danger"><?php if(isset(Validation::$errors['lozinka'])){ echo Validation::$errors['lozinka']; } ?></p>
      </div>
      
      <input type="submit" class="btn btn-primary" name="register" value="Register">
    </form>
    </div>
  </div>
</div>