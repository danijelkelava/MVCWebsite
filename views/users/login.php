<div class="card">
  <div class="card-header">
    <h1>User Login</h1>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" aria-describedby="" placeholder="Email">
      </div>

      <div class="form-group">
        <label for="lozinka">Password</label>
        <input type="password" class="form-control" id="lozinka" name="lozinka" aria-describedby="" placeholder="Password">
      </div>
      
      <input type="submit" class="btn btn-primary" name="login" value="Login">
    </form>
    </div>
  </div>
</div>