<?php 
session_start();
if (!isset($_SESSION['id_admin'])) {
  header('Location:login');
}
require "functions.php";
$titlePage = "Video";

$resultVideo= query("SELECT * FROM video");

if (isset($_POST['tambahVideo'])) {
  tambahVideo($_POST);
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

          <div class="row mt-4">
            <div class="col-6 d-flex justify-content-start align-items-end">
              <button type="button" class="btn btn-success btn-sm ml-4 p-2 pr-md-4 pl-md-4" data-toggle="modal" data-target="#tambahData" data-whatever="@mdo">
                <i class="fa-solid fa-video"></i>
                Tambah Video
              </button>

              <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahDataLabel">Tambah Video</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="judul" class="col-form-label">Judul:</label>
                            <input type="text" class="form-control" id="judul" name="judul" required oninvalid="this.setCustomValidity('Judul Video harus diisi..')" oninput="setCustomValidity('')">
                          </div>
                          <div class="form-group">
                            <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 150px"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="foto" class="col-form-label">Thumbnail:</label>
                            <input type="file" class="form-control" name="foto" id="foto" aria-describedby="foto" aria-label="Upload" required oninvalid="this.setCustomValidity('Foto Thumbnail harus ada..')" oninput="setCustomValidity('')">
                            <p class="text-start text-info ml-1">1170px x 550px <span class="text-danger">[JPG, JPEG, PNG]</span></p>
                          </div>
                          <div class="form-group">
                            <label for="video" class="col-form-label">Video:</label>
                            <input type="file" class="form-control" name="video" id="video" aria-describedby="video" aria-label="Upload" required oninvalid="this.setCustomValidity('Video harus diisi..')" oninput="setCustomValidity('')">
                            <p class="text-start text-info ml-1">650px x 380px <span class="text-danger">[MP4]</span> </p>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success" name="tambahVideo">Tambah Data</button>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-success">
                  <tr class="text-center">
                    <th>No.</th>
                    <th>Judul Video</th>
                    <th>Thumbnail</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  <?php foreach ($resultVideo as $row) : ?>
                    <tr class="text-center">
                      <td><?= $i++; ?></td>
                      <td><?= $row['judul']; ?></td>
                      <td>
                        <img src="../../assets/img/thumbnail/<?=$row['foto'];?>" width="200px" height="100px" style="object-fit: cover;" alt="">
                      </td>
                      <td><?= $row['tgl_post']; ?></td>
                      <td>
                        <a href="video-detail?id=<?=$row['id_video']?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square mr-1"></i>Edit</a>
                        <a href="hapus.php?titlePage=<?=$titlePage;?>&id=<?=$row['id_video'];?>" class="btn btn-danger"><i class="fa-solid fa-trash mr-1"></i>Delete</a>
                      </td>
                      
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
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
