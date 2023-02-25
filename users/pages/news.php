<?php 
session_start();
require "functions.php";

$titlePage = "News";
$resultNews = mysqli_query($connect, "SELECT * FROM news");

if (isset($_GET['cari'])) {
  $search = $_GET['search'];
  $query = "SELECT * FROM news WHERE judul LIKE '%$search%'";
  $result = queryResult($query);
  $num_rows = mysqli_num_rows($result);
} else {
  $query = "SELECT * FROM news";
  $result = queryResult($query);
  $num_rows = mysqli_num_rows($result);
}


// pagination
  // Jumlah data yang ingin ditampilkan pada setiap halaman
  $data_per_halaman = 9;

  // Hitung jumlah total data yang ada pada tabel video
  $total_data = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM news"));

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
    $query = "SELECT * FROM news WHERE judul LIKE '%$search%' LIMIT $index_data_awal, $data_per_halaman";
  } else {
    $query = "SELECT * FROM news LIMIT $index_data_awal, $data_per_halaman";
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

        <div class="col-lg-12 mb-5">
          <div class="sidebar">
            <!-- Search Widget Start -->
            <div class="sidebar-widget widget-search">
              <h5 class="widget-title">Search</h5>
              <form method="GET">
                <div class="sigma_search-adv-input">
                  <input type="text" class="form-control" placeholder="Search News" name="search" value="">
                  <button type="submit" name="cari"><i class="fa fa-search"></i></button>
                </div>
              </form>
            </div>
            <!-- Search Widget End -->
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row">
            <?php 
            if ($num_rows > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <!-- Article Start -->
              <div class="col-md-4">
                <article class="sigma_post">
                  <div class="sigma_post-thumb">
                    <a href="news-detail?id=<?= $row['id_news']?>">
                      <img src="../../assets/img/news/<?= $row['foto']?>" alt="post" style="max-width: 100%; height: 260px; object-fit: cover;">
                    </a>
                  </div>
                  <div class="sigma_post-body">
                    <div class="sigma_post-meta">
                      <p class="sigma_post-date"> <i class="far fa-calendar"></i> <?= $row['tgl_post']; ?></p>
                    </div>
                    <h5> <a href="news-detail?id=<?= $row['id_news']?>"><?= $row['judul']; ?></a> </h5>
                  </div>
                </article>
              </div>
              <!-- Article End -->
            <?php } } else { ?>
              <p align="center">No result found..</p>
            <?php } ?>
          </div>

        </div>

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
  </div>

  <?php include('../inc/footer.php') ?>

  <!-- partial:partia/__scripts.html -->
  <?php include('../inc/script.php'); ?>
  <!-- partial -->

</body>


<!-- Mirrored from slidesigma.com/themes/html/mircco/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 15:28:10 GMT -->
</html>
