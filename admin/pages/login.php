<?php
session_start();

require 'functions.php';
$titlePage="Login";

if (isset($_POST['login'])) {
  login($_POST);
}

if (isset($_GET['logoutAdmin']) && $_GET['logoutAdmin'] == 1) {
    $_SESSION['logoutAdmin'] = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('../inc/head.php');?> 
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <h3 class="h3"><b>Admin </b>Login</h3>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Log In Your Account</p>
      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="username" class="form-control" placeholder="Username" pattern="[^\x22\x27]*" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fa fa-user-circle" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" pattern="[^\x22\x27]*" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block" name="login">Log In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
  <?php include('../inc/script.php'); ?>
</body>
</html>
