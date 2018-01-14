<div class="container-fluid">          
  <h1 class="display-6">Register</h1>         
</div>
<div class="container">
  <div class="row">
    <div class="col">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="" placeholder="Unesite ime">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" aria-describedby="" placeholder="Email">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" aria-describedby="" placeholder="Password">
      </div>
      
      <input type="submit" class="btn btn-primary" name="register" value="Register">
    </form>
    </div>
  </div>
</div>