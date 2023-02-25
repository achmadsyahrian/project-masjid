<?php 
session_start();
require "functions.php";

$titlePage = "Videos";
$resultMasjid = query("SELECT * FROM masjid")[0];
$id_video = $_GET['id'];
$dataVideo = query("SELECT * FROM video  WHERE id_video = $id_video")[0];

$resultVideo = query("SELECT * FROM video ORDER BY tgl_post DESC LIMIT 4");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from slidesigma.com/themes/html/mircco/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 15:26:15 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

  <?php include('../inc/head.php'); ?>
  <style>
                .embed-responsive {
                  position: relative;
                  display: block;
                  width: 100%;
                  padding: 0;
                  overflow: hidden;
                }

                .embed-responsive::before {
                  content: "";
                  display: block;
                  padding-top: 56.25%; /* aspect ratio 16:9 */
                }

                .embed-responsive-item {
                  position: absolute;
                  top: 0;
                  bottom: 0;
                  left: 0;
                  width: 100%;
                  height: 100%;
                  border: 0;
                  max-width: 100%;
                  height: auto;
                }
              </style>
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


  <div class="section sigma_post-single">
    <div class="container">

      <div class="row">

        <div class="col-lg-8">
          <div class="post-detail-wrapper">

            <div class="entry-content">
              <h4 class="entry-title"><?= $dataVideo['judul']; ?></h4>
              <div class="sigma_post-meta">
                <i class="far fa-calendar ms-3"></i> <?= $dataVideo['tgl_post']; ?>
              </div>
              <div class="embed-responsive responsive embed-responsive-10by9" style="width: 100%;">
                <video class="embed-responsive-item embed-responsive" controls src="../../assets/video/<?= $dataVideo['video']?>"></video>
              </div>
              <p class="my-4">
                <?= $dataVideo['deskripsi'] ? $dataVideo['deskripsi'] : "Tidak ada deskripsi tentang Video ini"; ?>
              </p>
            </div>

          </div>
        </div>

        <!-- Sidebar Start -->
        <div class="col-lg-4">
          <div class="sidebar">
            <!-- Popular Feed Start -->
            <div class="sidebar-widget widget-recent-posts">
              <h5 class="widget-title">Recent Videos</h5>
              <?php foreach ($resultVideo as $row) : ?>
                <div class="col-md-7 mb-30 text-left">
                  <a href="video-detail?id=<?= $row['id_video'];?>">
                    <div class="sigma_video-popup-wrap">
                      <img src="../../assets/img/thumbnail/<?=$row['foto'];?>" alt="video">
                      <a href="video-detail?id=<?= $row['id_video'];?>" class="sigma_video-popup popup-sm">
                        <i class="fas fa-play"></i>
                      </a>
                    </div>
                    <p style="letter-spacing: -0.6px;  line-height: 1.4; font-weight:500;" class="mb-0 fs-7"><?= $row['judul']; ?></p>
                    <i class="far fa-calendar"></i> <?= $row['tgl_post']; ?>
                    </a>
                </div>
              <?php endforeach; ?>
              <a href="videos" class="sigma_btn-custom section-button">See More Video <i class="far fa-arrow-right"></i>
                 <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </a>
            </div>
            <!-- Popular Feed End -->

            <!-- Social Media Start -->
            <div class="sidebar-widget">
              <h5 class="widget-title">Contact Us</h5>
              <ul class="sigma_sm square light">
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
            <!-- Social Media End -->



          </div>
        </div>
        <!-- Sidebar End -->

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
