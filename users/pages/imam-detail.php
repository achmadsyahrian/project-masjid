<?php 
session_start();
require "functions.php";
$titlePage = "Imam";
$id_imam = $_GET['id'];
$dataImam = query("SELECT * FROM imam WHERE id_imam = $id_imam")[0];


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


   <!-- Post Content Start -->
  <div class="section sigma_post-single">
    <div class="container">

      <div class="row">

        <div class="col-12">

            <div class="entry-content">
              <div class="sigma_volunteer-detail mb-5">
                <div class="row">
                  <div class="col-lg-5">
                    <div class="sigma_member-image style-1">
                      <img src="../../assets/img/imam/<?=$dataImam['foto'];?>" style="width:376px; height:479px;" class="mb-0" alt="volunteer">
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="sigma_volunteer-detail-inner mt-5 mt-lg-0 ps-0 ps-lg-4">
                      <h3 class="sigma_member-name"><?= $dataImam['nama_imam']; ?></h3>
                      <span class="sigma_volunteer-detail-category">Imam</span>
                      <ul class="sigma_volunteer-detail-info">
                        <li>
                          <i class="fas fa-phone"></i>
                          <span class="title">Phone:</span><?= $dataImam['telp']; ?>
                        </li>
                        <li>
                          <i class="fas fa-envelope"></i>
                          <span class="title">Email:</span><?= $dataImam['email'] ? $dataImam['email'] : "-"; ?>
                        </li>
                        <li>
                          <i class="fas fa-map-marker-alt"></i>
                          <span class="title">Alamat:</span><?= $dataImam['email'] ? $dataImam['email'] : "-"; ?>
                        </li>
                      </ul>
                      <ul class="sigma_volunteer-detail-info">
                        <li>
                          <i class="fab fa-facebook-f"></i>
                          <span class="title">Facebook:</span>
                          <?php if ($dataImam['facebook']) : ?>
                            <a href="<?= $dataImam['facebook'] ? $dataImam['facebook'] : "#"; ?>">
                              <?= $dataImam['facebook'] ? $dataImam['facebook'] : "-"; ?>
                            </a>
                          <?php else : ?>
                            <p style="margin:0;">-</p>
                          <?php endif; ?>
                        </li>
                        <li>
                          <i class="fab fa-instagram"></i>
                          <span class="title">Instagram:</span>
                          <?php if ($dataImam['instagram']) : ?>
                            <a href="<?= $dataImam['instagram'] ? $dataImam['instagram'] : "#"; ?>">
                              <?= $dataImam['instagram'] ? $dataImam['instagram'] : "-"; ?>
                            </a>
                          <?php else : ?>
                            <p style="margin:0;">-</p>
                          <?php endif; ?>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <h4>About Achmad Syahrian</h4>
              <p><?= $dataImam['deskripsi'] ? $dataImam['deskripsi'] : "Tidak ada deskripsi tentang imam ini"; ?></p>
              <hr>
        </div>

      </div>

    </div>
  </div>
</div>
  <!-- Post Content End -->

  <?php include('../inc/footer.php') ?>

  <!-- partial:partia/__scripts.html -->
  <?php include('../inc/script.php'); ?>
  <!-- partial -->

</body>


<!-- Mirrored from slidesigma.com/themes/html/mircco/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 15:28:10 GMT -->
</html>
