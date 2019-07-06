<?php include('includes/header.php'); ?>

<main>
<section id="user-msg">
  <div class="card">
    <div class="card-body">
      <?php 
        if(isset($_SESSION['userName'])) {
          $user = $_SESSION['userName'];
          echo '<p>Welcome '. $user .'. You are Logged in</p>';
        } 
        else if(isset($_GET['logout'])){
         
            if($_GET['logout'] == 'success') {
              echo 'You are logged out.';
            }
       
        }
        else {
          echo '<p>You are NOT Logged in. Please Log in to explore.</p>';
        }
        
      ?>
    </div>
  </div>
</section>
</main>

<?php include('includes/footer.php'); ?>
