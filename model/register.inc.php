<?php

  if(isset($_POST['register-submit'])) {
    
    require '../config/config.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password'];
    $password2 = $_POST['confirm-password'];


    if(empty($username) || empty($email) || empty($password1) || empty($password2)) {
      header("Location: ../register.php?error=emptyfields&uid=".$username."&mail=".$email);
      exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../register.php?error=invaliduidmail");
      exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../register.php?error=invalidmail&uid=".$username);
      exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../register.php?error=invaliduname&email=".$email);
      exit();
    }
    else if($password1 !== $password2) {
      header("Location: ../register.php?error=checkpassword&uid=".$username."&mail=".$email);
      exit();
    }
    else {
      $sql = "SELECT userName FROM users WHERE userName=?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../register.php?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0) {
          header("Location: ../register.php?error=usertaken&mail=".$email);
          exit();
        }
        else {
          $sql = "INSERT INTO users (userName, userEmail, userPassword) VALUES (?, ?, ?)";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=sqlerror");
            exit();
          }
          else {
            $hashedPass = password_hash($password1, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPass);
            mysqli_stmt_execute($stmt);
            header("Location: ../register.php?register=success");
            exit();
          }
        }
      }
    }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  }
  else {
    header("Location: ../register.php");
    exit();
  }