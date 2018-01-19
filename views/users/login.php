<div class="card">
  <div class="card-header">
    <h1>User Login</h1>
    <p class="card-text">Register if you don't have account already.</p>
    <a class="btn btn-outline-dark" href="<?php echo ROOT_PATH; ?>users/register">Register</a>
  </div>
</div>
<div class="container">
  <div class="row">
    <?php 
      if (isset($_SESSION['activate'])) {
       echo '<div class="alert alert-primary" role="alert">';
       echo $_SESSION['activate']; 
       echo '</div>'; 
       unset($_SESSION['activate']);        
      }

      if (isset($_SESSION['error_login'])) {
       echo '<div class="alert alert-danger" role="alert">';
       echo $_SESSION['error_login']; 
       echo '</div>'; 
       unset($_SESSION['error_login']);        
      }
    ?>
  </div>
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