<?php include('includes/header.php'); ?>

<main>
  <section id="login-form">
    <form action="model/login.inc.php" method="post">
      <div class="form-group">
        <label>User Name</label>
        <input type="text" name="mailuid" class="form-control" placeholder="Username/Email">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
      </div>
      <button class="btn btn-success" type="submit" name="login-submit">Login</button>
    </form>
    <p>Not a user? <a href="register.php">Create Account</a></p>
  </section>
</main>

<?php include('includes/footer.php'); ?>
