
<div class="card text-center">
  <div class="card-header">
    <h1>Welcome to Todo App <?php Helper::htmlout($_SESSION['USER']['IME']); ?></h1>
    <p>You last login: <?php Helper::htmlout($_SESSION['USER']['LOGIN_DATE']); ?></p>
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a class="btn btn-primary text-center" href="<?php echo ROOT_PATH; ?>todos">Go to the list</a>
  </div>
</div>