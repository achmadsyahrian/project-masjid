<?php 
session_start();
require "functions.php";
$titlePage = "Videos";

$dataVideo = mysqli_query($connect, "SELECT * FROM video");

if (isset($_GET['cari'])) {
  $search = $_GET['search'];
  $query = "SELECT * FROM video WHERE judul LIKE '%$search%'";
  $result = queryResult($query);
  $num_rows = mysqli_num_rows($result);
} else {
  $query = "SELECT * FROM video";
  $result = queryResult($query);
  $num_rows = mysqli_num_rows($result);
}


// pagination
  // Jumlah data yang ingin ditampilkan pada setiap halaman
  $data_per_halaman = 12;

  // Hitung jumlah total data yang ada pada tabel video
  $total_data = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM video"));

  // Hitung jumlah total halaman yang dibutuhkan
  $total_halaman = ceil($total_data / $data_per_halaman);

  // Tentukan halaman saat ini yang sedang ditampilkan
  if (isset($_GET['page'])) {
    $halaman_saat_ini = $_GET['page'];
  } else {
    $halaman_saat_ini = 1;
  }

  // Tentukan index data yang akan ditampilkan pada halaman saat ini
  $index_data_awal = ($halaman_saat_ini - 1) * $data_per_halaman;

  // Query data video dengan batasan index data
  if (isset($_GET['cari'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM video WHERE judul LIKE '%$search%' LIMIT $index_data_awal, $data_per_halaman";
  } else {
    $query = "SELECT * FROM video LIMIT $index_data_awal, $data_per_halaman";
  }
  $result = queryResult($query);
  $num_rows = mysqli_num_rows($result);


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
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
              <div class="container">
                <div class="section-title text-center">
                  <p class="subtitle">Watch Video</p>
                  <h4 class="title">Our Video Gallery</h4>
                </div>
                <div class="col-lg-12 mb-5">
                  <div class="sidebar">
                    <!-- Search Widget Start -->
                    <div class="sidebar-widget widget-search">
                      <h5 class="widget-title">Search</h5>
                      <form method="GET">
                        <div class="sigma_search-adv-input">
                          <input type="text" class="form-control" placeholder="Search Video" name="search" value="">
                          <button type="submit" name="cari"><i class="fa fa-search"></i></button>
                        </div>
                      </form>
                    </div>
                    <!-- Search Widget End -->
                  </div>
                </div>
                <div class="row sigma_broadcast-video">
                  <?php
                    if ($num_rows > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                        <div class="col-lg-3 col-sm-6 mb-30">
                          <a href="video-detail?id=<?= $row['id_video'];?>">
                            <div class="sigma_video-popup-wrap">
                              <img src="../../assets/img/thumbnail/<?= $row['foto']?>"style="max-width: 100%; height: 200px; object-fit: cover;" alt="video">
                              <a href="video-detail?id=<?= $row['id_video'];?>" class="sigma_video-popup popup-sm ">
                                <i class="fas fa-play"></i>
                              </a>
                            </div>
                            <h6 style="letter-spacing: -0.6px;  line-height: 1.2;" class="mb-0 fs-6"><?= $row['judul']; ?></h6>
                            <p><?= $row['tgl_post']; ?></p>
                          </a>
                        </div>
                    <?php } } else { ?>
                      <p align="center">No result found..</p>
                    <?php } ?>
                </div>


              </div>
              <!-- Tampilkan tombol pagination -->
                <ul class="pagination mb-0">
                  <?php if ($halaman_saat_ini > 1) { ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $halaman_saat_ini - 1 ?>"><i class="far fa-chevron-left"></i></a></li>
                  <?php } else { ?>
                    <li class="page-item disabled"><a class="page-link"><i class="far fa-chevron-left"></i></a></li>
                  <?php } ?>
                  <?php for ($i = 1; $i <= $total_halaman; $i++) { ?>
                    <?php if ($i == $halaman_saat_ini) { ?>
                      <li class="page-item active"><a class="page-link"><?= $i ?></a></li>
                    <?php } else { ?>
                      <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php } ?>
                  <?php } ?>
                  <?php if ($halaman_saat_ini < $total_halaman) { ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $halaman_saat_ini + 1 ?>"><i class="far fa-chevron-right"></i></a></li>
                  <?php } else { ?>
                    <li class="page-item disabled"><a class="page-link"><i class="far fa-chevron-right"></i></a></li>
                  <?php } ?>
                </ul>
            <!-- Article End -->

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
