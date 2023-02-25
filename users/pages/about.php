<?php 
session_start();
require "functions.php";
$titlePage = "About";

$resultMasjid = query("SELECT * FROM masjid")[0];

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


   <div class="section">
    <div class="container">

      <div class="entry-content">
        <span class="fw-600 custom-primary text-uppercase">Profile</span>
        <h3 class="entry-title">Masjid <?= $resultMasjid['nama_masjid']; ?></h3>

        <div class="sigma_post-single-thumb">
            <img src="../../assets/img/about/<?= $resultMasjid['foto'];?>"  alt="post">
          <div class="sigma_box">
            <div class="sigma_list-item">
              <label>Pendiri:</label>
              <span>
                <?= $resultMasjid['pendiri'] ? $resultMasjid['pendiri'] : "-"; ?>
              </span>
            </div>
            <div class="sigma_list-item">
              <label>Dibangun:</label>
              <span>
                <?= $resultMasjid['tgl_bangun'] ? $resultMasjid['tgl_bangun'] : "-"; ?>
              </span>
            </div>
            <div class="sigma_list-item">
              <label>Alamat:</label>
              <span>
                <?= $resultMasjid['alamat'] ? $resultMasjid['alamat'] : "-"; ?>
              </span>
            </div>
            <div class="sigma_list-item">
              <ul class="sigma_sm">
                <li>
                  <a href="<?= $resultMasjid['facebook'] ? $resultMasjid['facebook'] : "#"; ?>">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                <li>
                  <a href="<?= $resultMasjid['youtube'] ? $resultMasjid['youtube'] : "#"; ?>">
                    <i class="fab fa-youtube"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <p> <?= $resultMasjid['deskripsi'] ? $resultMasjid['deskripsi'] : "Tidak ada deskripsi tentang masjid ini"; ?> </p>
        <div class="sigma_box">
          <div class="row">
            <div class="col-md-4">
              <div class="sigma_icon-block icon-block-3">
                <div class="icon-wrapper">
                  <i class="flaticon-mosque"></i>
                </div>
                <div class="sigma_icon-block-content">
                  <h5> Masjid </h5>
                  <p>Sebagai tempat beribadah umat Islam</p>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="sigma_icon-block icon-block-3">
                <div class="icon-wrapper">
                  <i class="flaticon-quran"></i>
                </div>
                <div class="sigma_icon-block-content">
                  <h5> Edukasi </h5>
                  <p>Kursus agama, belajar bahasa Arab, dan program mengaji.</p>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="sigma_icon-block icon-block-3">
                <div class="icon-wrapper">
                  <i class="flaticon-islamic-new-year"></i>
                </div>
                <div class="sigma_icon-block-content">
                  <h5> Kegiatan </h5>
                  <p> Kajian Islam, Akad Nikah, Sosial, Kursus Al-Quran DLL</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('../inc/footer.php') ?>

  <!-- partial:partia/__scripts.html -->
  <?php include('../inc/script.php'); ?>
  <!-- partial -->

</body>


<!-- Mirrored from slidesigma.com/themes/html/mircco/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 15:28:10 GMT -->
</html>
