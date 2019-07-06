<?php 
  session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Login System</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">PHP Login System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <?php 
            if(isset($_SESSION['userName'])) {
              echo '<li class="nav-item">
                      <a class="nav-link" href="users.php">Users</a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link" href="news.php">News</a>
                    </li>';
            } 
            else {
              echo '<li class="nav-item">
                      <a class="nav-link" href="login.php">Login</a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link" href="register.php">Register</a>
                    </li>';
            }
          ?>
          
        </ul>
        <?php 
        if(isset($_SESSION['userName'])) {
          echo '<div id="logout-btn">
                  <form action="model/logout.inc.php" method="post">
                    <button class="btn btn-danger" type="submit" name="logout-submit">Logout</button>
                  </form>
                </div>';
        } 
        else {
          echo '';
        }
      ?>
        
      </div>
    </nav>
  </header>