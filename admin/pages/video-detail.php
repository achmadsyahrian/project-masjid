<?php 
session_start();
if (!isset($_SESSION['id_admin'])) {
  header('Location:login');
}
require "functions.php";
$titlePage = "Video";

$idVideo = $_GET['id'];
$resultVideo= query("SELECT * FROM video WHERE id_video = $idVideo")[0];

if (isset($_POST['simpan'])) {
  ubahVideo($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('../inc/head.php'); ?>
  
<style>
  .dataTables_filter {
    float: right;
  }

  .pagination {
    justify-content: flex-end;
  }

  .page-item.active .page-link {
    background-color: #4caf50;
    border-color: #4caf50;
    color: white;
  }

  .card-title {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 20px;
  }

  table.dataTable th,
  table.dataTable td {
    white-space: nowrap;
  }

  .dataTables_empty {
  text-align: center;
}

</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../users/inc/favicon.ico" alt="AdminLTELogo" height="60" width="60">
  </div> -->

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
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                      <video class="embed-responsive-item embed-responsive" controls src="../../assets/video/<?= $resultVideo['video']?>" height="300px" style="object-fit:contain;"></video>
                      <p class="text-center text-info ml-1"><span class="text-danger">[</span>650px x 380px <span class="text-danger">]</span></p>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-12">
          <form method="POST" enctype="multipart/form-data">
                      <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" required id="judul" name="judul" aria-describedby="emailHelp" value="<?=$resultVideo['judul']?>">
                        <input type="hidden" class="form-control" required id="id_video" name="id_video" aria-describedby="emailHelp" value="<?=$resultVideo['id_video']?>">
                      </div>
                      <div class="mb-3">
                        <label for="tgl_post" class="form-label">Tanggal Post</label>
                        <input type="date" class="form-control" readonly id="tgl_post" name="tgl_post" value="<?=$resultVideo['tgl_post']?>">
                      </div>
                      <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 200px"><?= $resultVideo['deskripsi']; ?></textarea>
                      </div>
                      <div class="form-group mt-4">
                        <label for="foto">Change Thumbnail:</label>  
                        <input type="file" class="form-control" id="foto" aria-describedby="foto" aria-label="Upload" name="foto">
                        <i class="text-info ml-1"> <span class="text-danger">[JPG, JPEG, PNG]</span></i>
                      </div>
                      <div class="form-group mt-4">
                      <label for="video">Change Video:</label>  
                      <input type="file" class="form-control" id="video" aria-describedby="video" aria-label="Upload" name="video">
                      <i class="text-info ml-1"><span class="text-danger">[MP4]</span></i>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-center font-italic text-info ml-1">Kosongkan jika tidak ada yang ingin diinputkan</p>
                    <button type="submit" class="btn btn-primary btn-block" name="simpan">Simpan</button>
                  </div>
                </div>
              </div>
          </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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
