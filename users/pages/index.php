<?php 
session_start();
require "functions.php";
$titlePage = "Home";

$resultMasjid = query("SELECT * FROM masjid")[0];
$resultVideo = query("SELECT * FROM video ORDER BY tgl_post DESC LIMIT 4");
$resultNews = query("SELECT * FROM news ORDER BY tgl_post DESC LIMIT 5");
$resultImam = query("SELECT * FROM imam ORDER BY id_imam DESC LIMIT 4");


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
  <div class="sigma_banner banner-2">

    <div class="sigma_banner-slider">

      <!-- Banner Item Start -->
      <div class="light-bg sigma_banner-slider-inner bg-cover bg-center dark-overlay dark-overlay-2 bg-norepeat" style="background-image: url('../../assets/img/background/bg-index1.jpg');">
        <div class="sigma_banner-text">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-12 text-center">
                <h1 class="text-white title">Masjid <?= $resultMasjid['nama_masjid']; ?></h1>
                <p class="mb-0">"The secret of success in life is for a man to be ready for his opportunity when it comes." </p>
                <a href="about" class="sigma_btn-custom section-button">Explore Mosque <i class="far fa-arrow-right"></i>
                 <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Banner Item End -->

    </div>

  </div>
  <!-- Banner End --> 


  <!-- Broadcast Start -->
  <div class="section section-padding pt-0">
    <div class="container">
      <div class="section-title text-center">
        <p class="subtitle">Watch Video</p>
        <h4 class="title">Our Videos</h4>
      </div>
      <div class="row sigma_broadcast-video">
        <div class="col-lg-12">
          <div class="row">
            <?php if (empty($resultVideo)) : ?>
              <div class="col-12">
                <p class="text-dark text-center">No Video found..</p>
              </div>
            <?php else : ?>
            <?php foreach ($resultVideo as $row) : ?>
              <div class="col-md-3 mb-30">
                <a href="video-detail?id=<?= $row['id_video'];?>">
                  <div class="sigma_video-popup-wrap">
                    <img src="../../assets/img/thumbnail/<?= $row['foto'];?>" style="max-width: 100%; height: 200px; object-fit: cover;" alt="video">
                    <a href="video-detail?id=<?= $row['id_video']?>" class="sigma_video-popup popup-sm ">
                      <i class="fas fa-play"></i>
                    </a>
                  </div>
                  <h6 style="letter-spacing: -0.6px;  line-height: 1.2;" class="my-2 fs-6 text-center"><?= $row['judul']; ?></h6>
                </a>
              </div>
              <?php endforeach; ?>
              <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-12 text-center" >
          <a href="videos" class="sigma_btn-custom section-button">See More Video <i class="far fa-arrow-right"></i>
                 <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Broadcast End -->

  <!-- Sermons Start -->
  <div class="section section-padding sermon-section light-bg">
    <div class="container">

      <div class="section-title text-start flex-title">
        <div>
          <p class="subtitle">Blog</p>
          <h4 class="title mb-lg-0">News Feed</h4>
        </div>
        <div class="sigma_arrows">
          <i class="far fa-chevron-left slick-arrow slider-prev"></i>
          <i class="far fa-chevron-right slick-arrow slider-next"></i>
        </div>
      </div>

      <div class="portfolio-slider-2">
        <?php if (empty($resultNews)) : ?>
          <div class="col-12">
            <p class="text-dark text-center">No News found..</p>
          </div>
        <?php else : ?>
        <?php foreach ($resultNews as $row ) : ?>
          <div class="sigma_portfolio-item">
              <img src="../../assets/img/news/<?=$row['foto'];?>" style="max-width: 100%; height: 400px; object-fit: cover;" alt="portfolio">
            <div class="sigma_portfolio-item-content">
              <div class="sigma_portfolio-item-content-inner">
                <h5> <a href="news-detail.php?id=<?=$row['id_news'];?>"><?= $row['tgl_post']; ?> </a> </h5>
                <a href="news-detail.php?id=<?=$row['id_news'];?>"><p class="blockquote bg-transparent"><?= $row['judul']; ?></p></a> 
              </div>
              <a href="news-detail.php?id=<?=$row['id_news'];?>"><i class="fal fa-eye"></i></a>
            </div>
          </div>
        <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <div class="col-lg-12 text-center" >
          <a href="news" class="sigma_btn-custom section-button">See More News <i class="far fa-arrow-right"></i>
                 <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </a>
        </div>
    </div>
  </div>
  <!-- Sermons End -->

  <!-- volunteers Start -->
  <div class="section section-padding bg-cover secondary-overlay bg-center bg-norepeat" style="background-image: url(../../assets/img/background/bg-index2.jpg)">
    <div class="container">

      <div class="section-title text-center">
        <p class="subtitle text-white">Who</p>
        <h4 class="title text-white">Our Imams</h4>
      </div>

      <div class="row justify-content-center">
        <?php if (empty($resultImam)) : ?>
          <div class="col-12">
            <p class="text-light text-center">No Imam found..</p>
          </div>
        <?php else : ?>
          <?php foreach ($resultImam as $row) : ?>
            <div class="col-lg-3 col-md-6">
              <div class="sigma_volunteers volunteers-4">
                <div class="sigma_volunteers-thumb">
                  <img src="../../assets/img/imam/<?=$row['foto'];?>" style="border:4px solid white; max-width: 100%; height: 200px; object-fit: cover;" alt="volunteers">
                </div>
                <div class="sigma_volunteers-body">
                  <div class="sigma_volunteers-info">
                    <h5 class="text-white">
                      <a href="imam-detail?id=<?=$row['id_imam'];?>"><?= $row['nama_imam']; ?></a>
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>

      </div>
      <div class="row">
        <div class="col-lg-12 text-center" >
          <a href="imam" class="sigma_btn-custom section-button">See More Imam <i class="far fa-arrow-right"></i>
                 <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </a>
        </div>
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
