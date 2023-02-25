<?php 
session_start();
require "functions.php";
$titlePage = "Imam";

$resultImam = query("SELECT * FROM imam");


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from slidesigma.com/themes/html/mircco/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 15:26:15 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

  <?php include('../inc/head.php'); ?>

<body>

  <!-- Preloader Start -->
  <?php include('../inc/preloader.php'); ?>
  <!-- Preloader End -->

  <!-- partial:partia/__mobile-nav.html -->
  <?php include('../inc/mobile-nav.php'); ?>
  <!-- partial -->

  <!-- partial:partia/__header.html -->
  <?php include('../inc/header.php'); ?>
  <!-- partial -->

  <!-- Banner Start -->
  <?php include('../inc/sub-header.php'); ?>
  <!-- Banner End --> 


   <!-- volunteers Start -->
  <div class="section section-padding">
    <div class="container">

      <div class="row">
        <?php if (empty($resultImam)) : ?>
          <div class="col-12">
            <p class="text-dark text-center">No Imam found..</p>
          </div>
        <?php else : ?>
        <?php foreach ($resultImam as $row) :?>
          <div class="col-lg-3 col-md-6">
            <div class="sigma_volunteers volunteers-4">
              <div class="sigma_volunteers-thumb">
                <img src="../../assets/img/imam/<?=$row['foto'];?>" style=" max-width: 100%; height: 200px; object-fit: cover;" alt="volunteers">
              </div>
              <div class="sigma_volunteers-body">
                <div class="sigma_volunteers-info">
                  <h5>
                    <a href="imam-detail?id=<?=$row['id_imam']?>"><?= $row['nama_imam']; ?></a>
                  </h5>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>
      </div>

    </div>
  </div>
  <!-- volunteers End -->

  <?php include('../inc/footer.php') ?>

  <!-- partial:partia/__scripts.html -->
  <?php include('../inc/script.php'); ?>
  <!-- partial -->

</body>


<!-- Mirrored from slidesigma.com/themes/html/mircco/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 15:28:10 GMT -->
</html>
