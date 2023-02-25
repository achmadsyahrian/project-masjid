<?php 
session_start();

if (isset($_SESSION['id_user'])) {
	header("location:index");
}	

require "functions.php";
$titlePage = "Register";

if (isset($_POST['register'])) {
	register($_POST);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from slidesigma.com/themes/html/mircco/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 15:26:15 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

  <?php include('../inc/head.php'); ?>

<body>

  <!-- partial:partia/__mobile-nav.html -->
  <?php include('../inc/mobile-nav.php'); ?>
  <!-- partial -->

  <!-- partial:partia/__header.html -->
  <?php include('../inc/header.php'); ?>
  <!-- partial -->

  <!-- Banner Start -->
  <?php include('../inc/sub-header.php'); ?>
  <!-- Banner End --> 

<!-- Form Start -->
  <div class="section dark-overlay-1 bg-cover bg-center bg-norepeat light-bg">
    <div class="container">
      <div class="section-title text-center">
        <p class="subtitle">Autentikasi</p>
        <h4 class="title">REGISTER</h4>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-12 mb-lg-30">
          <form method="POST">
            <div class="form-row">
              <div class="col-lg-6 mx-auto">
                <div class="form-group">
                  <i class="far fa-user"></i>
                  <input type="text" class="form-control " placeholder="Nama" name="nama" value="">
                </div>
                <div class="form-group">
                  <i class="far fa-user"></i>
                  <input type="text" class="form-control " placeholder="Username" name="username" value="">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-lg-6 mx-auto">
                <div class="form-group">
                  <i class="far fa-lock"></i>
                  <input type="password" class="form-control " placeholder="Password" name="password" value="">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-lg-12">
                <button type="submit" class="sigma_btn-custom d-block w-30 mx-auto" name="register"> Register <i class="far fa-arrow-right"></i> </button>
                <div class="text-center my-2">
                  <a href="login" style="margin-top:10px;">Sudah punya akun?</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Form End -->

  <?php include('../inc/footer.php') ?>

  <!-- partial:partia/__scripts.html -->
  <?php include('../inc/script.php'); ?>
  <!-- partial -->

</body>


<!-- Mirrored from slidesigma.com/themes/html/mircco/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 15:28:10 GMT -->
</html>
