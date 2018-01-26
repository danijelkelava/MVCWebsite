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
        <input type="text" class="form-control" id="ime" name="ime" aria-describedby="" placeholder="Unesite ime">
      </div>

      <div class="form-group">
        <label for="prezime">Last Name</label>
        <input type="text" class="form-control" id="prezime" name="prezime" aria-describedby="" placeholder="Unesite ime">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" aria-describedby="" placeholder="Email">
      </div>

      <div class="form-group">
        <label for="lozinka">Password</label>
        <input type="password" class="form-control" id="lozinka" name="lozinka" aria-describedby="" placeholder="Password">
      </div>
      
      <input type="submit" class="btn btn-primary" name="register" value="Register">
    </form>
    </div>
  </div>
</div>