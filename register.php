<?php include('includes/header.php'); ?>

<main>
  <section id="register-form">
  <h1>Register Here</h1>
    <?php 
      if(isset($_GET['error'])) {
        if($_GET['error'] == 'emptyfields') {
          echo '<p class="alert alert-danger">Fill in all fields!</p>';
          $username = $_GET['uid'];
          $email = $_GET['mail'];
        }
        else if($_GET['error'] == 'invaliduidmail') {
          echo '<p class="alert alert-danger">Invalid username and password!</p>';
        }
        else if($_GET['error'] == 'invalidmail') {
          echo '<p class="alert alert-danger">Invalid email id!</p>';
          $username = $_GET['uid'];
          
        }
        else if($_GET['error'] == 'invaliduname') {
          echo '<p class="alert alert-danger">Invalid username!</p>';
          $email = $_GET['mail'];
        }
        else if($_GET['error'] == 'checkpassword') {
          echo '<p class="alert alert-danger">Your password does not match!</p>';
        }
        else if($_GET['error'] == 'usertaken') {
          echo '<p class="alert alert-danger">Username already exists!</p>';
        }
      }
      else if(isset($_GET['register']) == 'success') {
        echo '<p class="alert alert-success">Register Successfully.<a href="../login.php">Login Here</a></p>';
      }
      
    
    ?>
    <form action="model/register.inc.php" method="post">
      <div class="form-group">
        <label>User Name</label>
        <input type="text" name="username" class="form-control" placeholder="<?php if(isset($_GET['uid'])) {echo $username;} else echo 'Username'; ?>">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="<?php if(isset($_GET['mail'])) {echo $email;} else echo 'Email'; ?>">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
      </div>
      <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password">
      </div>
      <button class="btn btn-success" type="submit" name="register-submit">Register</button>
    </form>
    <p>Already Registered? <a href="login.php">Login</a></p>
  </section>
</main>

<?php include('includes/footer.php'); ?>
