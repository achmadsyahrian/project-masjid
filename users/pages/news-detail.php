<?php 
session_start();
require "functions.php";

$titlePage = "News";
$resultMasjid = query("SELECT * FROM masjid")[0];
$id_news = $_GET['id'];
$dataNews = query("SELECT * FROM news WHERE id_news = $id_news")[0];

$resultNews = query("SELECT * FROM news ORDER BY tgl_post DESC LIMIT 4");


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


  <div class="section sigma_post-single">
    <div class="container">

      <div class="row">

        <div class="col-lg-8">
          <div class="post-detail-wrapper">

            <div class="entry-content">
              <h4 class="entry-title"><?= $dataNews['judul']; ?></h4>
              <div class="sigma_post-meta">
                <i class="far fa-calendar ms-3"></i> <?= $dataNews['tgl_post']; ?>
              </div>
              <a href="../../assets/img/news/<?= $dataNews['foto'];?>" class="gallery-thumb">
                <img src="../../assets/img/news/<?= $dataNews['foto'];?>" style="max-width: 100%; height: 380px; object-fit: cover;" alt="post">
              </a>
              <p><?= $dataNews['deskripsi'] ? $dataNews['deskripsi'] : "Tidak ada deskripsi tentang News ini"; ?></p>
            </div>

          </div>
        </div>

        <!-- Sidebar Start -->
        <div class="col-lg-4">
          <div class="sidebar">
            <!-- Popular Feed Start -->
            <div class="sidebar-widget widget-recent-posts">
              <h5 class="widget-title">Recent Posts</h5>
                <?php foreach ($resultNews as $row ) : ?>
                  <article class="sigma_recent-post">
                    <a href="news-detail?id=<?= $row['id_news'];?>">
                      <img src="../../assets/img/news/<?= $row['foto'];?>" style="width:100px; height:75px; object-fit: cover;" alt="post">
                    </a>
                    <div class="sigma_recent-post-body">
                      <h6> <a href="news-detail?id=<?= $row['id_news'];?>"><?= $row['judul']; ?></a> </h6>
                      <a href="news-detail?id=<?= $row['id_news'];?>"> <i class="far fa-calendar"></i><?= $row['tgl_post']; ?></a>
                    </div>
                  </article>
                <?php endforeach; ?>
                <a href="news" class="sigma_btn-custom section-button">See More News <i class="far fa-arrow-right"></i>
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
