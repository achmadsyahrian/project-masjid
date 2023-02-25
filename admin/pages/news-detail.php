<?php 
session_start();
if (!isset($_SESSION['id_admin'])) {
  header('Location:login');
}
require "functions.php";
$titlePage = "News";

$idNews = $_GET['id'];
$resultNews= query("SELECT * FROM news WHERE id_news = $idNews")[0];

if (isset($_POST['simpan'])) {
  ubahNews($_POST);
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
                <div class="row" >
                  <div class="col-md-5">
            <form method="POST" enctype="multipart/form-data">  
                    <img src="../../assets/img/news/<?=$resultNews['foto']?>" width="100%" height="350px" style="object-fit: cover;" alt="">
                    <p class="text-center text-info ml-1"><span class="text-danger">[</span>650px x 380px<span class="text-danger">]</span></p>
                    <div class="form-group mt-4">
                      <label for="foto">Upload Foto:</label>  
                      <input type="file" class="form-control" id="foto" aria-describedby="foto" aria-label="Upload" name="foto">
                      <i class="text-info ml-1">kosongkan jika tidak ingin mengubah foto! <span class="text-danger">[JPG, JPEG, PNG]</span></i>
                    </div>
                  </div>
                  <div class="col-md-7">
                      <div class="mb-1">
                        <label for="judul" class="form-label">Judul :</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?=$resultNews['judul'];?>">
                        <input type="hidden" class="form-control" id="judul" name="id_news" value="<?=$resultNews['id_news'];?>">
                      </div>
                      <div class="form-floating" >
                        <label for="deskripsi">Deskripsi :</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 300px"><?= $resultNews['deskripsi']; ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                    <p class="text-center font-italic text-info ml-1">Kosongkan jika tidak ada yang ingin diinputkan</p>
                    <button type="submit" class="btn btn-primary btn-block" name="simpan">Simpan</button>
                  </div>
                </div>
            </form>
                </div>
                
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
