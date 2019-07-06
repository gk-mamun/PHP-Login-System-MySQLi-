<?php

  if(isset($_POST['login-submit'])) {
    require '../config/config.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['password'];

    if(empty($mailuid) || empty($password)) {
      header("Location: ../login.php?error=emptyfields");
      exit();
    }
    else {
      $sql = "SELECT * FROM users WHERE userName=? OR userEmail=?;";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)) {
          $passCheck = password_verify($password, $row['userPassword']);
          if($passCheck == false) {
            header("Location: ../login.php?error=wrongpassword");
            exit();
          }
          else if ($passCheck == true) {
            session_start();
            $_SESSION['userName'] = $row['userName'];

            header("Location: ../index.php?login=success");
            exit();

          }
          else {
            header("Location: ../login.php?error=wrongpassword");
            exit();
          }
        }
        else {
          header("Location: ../login.php?error=nouser");
          exit();
        }
      }
    }

  }
  else {
    header("Location: ../login.php");
  }