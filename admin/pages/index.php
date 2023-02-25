<?php 
session_start();
if (!isset($_SESSION['id_admin'])) {
  header('Location:login');
}
require "functions.php";
$titlePage = "Dashboard";

$resultUser = mysqli_query($connect,"SELECT * FROM users WHERE level = 'user'");
$jumlahUser = mysqli_num_rows($resultUser);

$resultNews = mysqli_query($connect,"SELECT * FROM news");
$jumlahNews = mysqli_num_rows($resultNews);

$resultVideos = mysqli_query($connect,"SELECT * FROM video");
$jumlahVideos = mysqli_num_rows($resultVideos);

$resultImam = mysqli_query($connect,"SELECT * FROM imam");
$jumlahImam = mysqli_num_rows($resultImam);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('../inc/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../users/inc/favicon.ico" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php include('../inc/navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('../inc/sidebar.php'); ?>


  <div class="content-wrapper">
    <?php include('../inc/content-header.php'); ?>
    <!-- Main Content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $jumlahUser; ?></h3>
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="fa fa-users nav-icon" aria-hidden="true"></i>
              </div>
              <a href="users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6 ">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3 class="text-light"><?= $jumlahNews; ?></h3>
                <p class="text-light">News</p>
              </div>
              <div class="icon">
                <i class="nav-icon fa-solid fa-newspaper text-light"></i>
              </div>
              <a href="news" class="small-box-footer text-light">More info <i class="fas text-light fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $jumlahVideos; ?></h3>
                <p>Videos</p>
              </div>
              <div class="icon">
                <i class="nav-icon fa-solid fa-video"></i>
              </div>
              <a href="video" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $jumlahImam; ?></h3>
                <p>Imams</p>
              </div>
              <div class="icon">
                <i class="nav-icon fa-solid fa-user"></i>
              </div>
              <a href="imam" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

  <?php include('../inc/footer.php'); ?>
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include('../inc/script.php'); ?>
</body>
</html>
