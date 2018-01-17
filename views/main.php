<!DOCTYPE html>
<html>
<head>
	<title>Todo App</title>
	<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>assets/css/style.css">
</head>
<body>

 <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="/">Todo App</a>
      <div class="navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_PATH; ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_PATH; ?>todos">Todos</a>
          </li>
        </ul>
        <?php if(isset($_SESSION['is_logged'])) : ?>
          <ul class="navbar-nav navbar-right">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_PATH; ?>"><?php Helper::htmlout($_SESSION['USER']['ime']); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_PATH; ?>users/logout">Logout</a>
          </li>        
        </ul>
        <?php else : ?>
        <ul class="navbar-nav navbar-right">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_PATH; ?>users/login">Login <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_PATH; ?>users/register">Register</a>
          </li>        
        </ul>
        <?php endif; ?>
      </div>
    </nav>

    <main role="main" class="container">
    	
    		<?php require $view; ?>

    </main><!-- /.container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="/assets/js/read_tasks.js"></script>
    <script src="/assets/js/delete_task.js"></script>
</body>
</html>