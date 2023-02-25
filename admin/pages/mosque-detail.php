<?php 
session_start();
if (!isset($_SESSION['id_admin'])) {
  header('Location:login');
}
require "functions.php";
$titlePage = "Mosque";

$resultMasjid= query("SELECT * FROM masjid")[0];


if (isset($_POST['simpan'])) {
  ubahMasjid($_POST);
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
                    <img src="../../assets/img/about/<?= $resultMasjid['foto'];?>" width="100%" height="400px" style="object-fit: cover;" alt="post">
                    <p class="text-center text-info ml-1"><span class="text-danger">[</span>1170px x 550px<span class="text-danger">]</span></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
          <form method="POST" enctype="multipart/form-data">
                    <div class="form-group mt-4">
                      <label for="foto">Change Foto:</label>  
                      <input type="file" class="form-control" id="foto" aria-describedby="foto" aria-label="Upload" name="foto">
                      <i class="text-info ml-1"><span class="text-danger">[JPG, JPEG, PNG]</span></i>
                    </div>
                    <div class="mb-3">
                      <label for="nama_masjid" class="form-label mt-4">Nama Masjid :</label>
                      <input type="text" class="form-control" id="nama_masjid" name="nama_masjid" aria-describedby="emailHelp" value="<?=$resultMasjid['nama_masjid']?>" required oninvalid="this.setCustomValidity('Nama Masjid harus diisi..')" oninput="setCustomValidity('')">
                      <input type="hidden" class="form-control" id="" name="id_masjid" aria-describedby="emailHelp" value="<?=$resultMasjid['id_masjid']?>">
                    </div>
                    <div class="mb-3">
                      <label for="deskripsi" class="form-label">Deskripsi</label>
                      <textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 215px"><?= $resultMasjid['deskripsi']; ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <div class="mb-3">
                        <label for="pendiri" class="form-label">Pendiri</label>
                        <input type="text" class="form-control" id="pendiri" name="pendiri" aria-describedby="emailHelp" value="<?=$resultMasjid['pendiri']?>">
                      </div>
                      <div class="mb-3">
                        <label for="tgl_bangun" class="form-label">Tanggal Bangun</label>
                        <input type="date" class="form-control" id="tgl_bangun" name="tgl_bangun" value="<?=$resultMasjid['tgl_bangun']?>">
                      </div>
                      <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" style="height: 200px"><?= $resultMasjid['alamat']; ?></textarea>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="mb-3">
                        <label for="telp" class="form-label">No. Telepon</label>
                        <input type="number" class="form-control" placeholder="ex: 081234567890" id="telp" name="telp" aria-describedby="emailHelp" value="<?=$resultMasjid['telp'];?>">
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="ex: email@gmail.com" value="<?=$resultMasjid['email']?>">
                      </div>
                      <div class="mb-3">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="facebook" class="form-control" id="facebook" placeholder="ex: https://web.facebook.com/masjid" name="facebook" value="<?=$resultMasjid['facebook']?>">
                      </div>
                      <div class="mb-3">
                        <label for="youtube" class="form-label">Youtube</label>
                        <input type="youtube" class="form-control" id="youtube" name="youtube" placeholder="ex: https://www.youtube.com/@masjid" value="<?=$resultMasjid['youtube']?>">
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
