<?php 
session_start();
if (!isset($_SESSION['id_admin'])) {
  header('Location:login');
}
require "functions.php";
$titlePage = "Imams";

$resultImams= query("SELECT * FROM imam");

if (isset($_POST['tambahImam'])) {
  tambahImam($_POST);
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
                <i class="fa-solid fa-user"></i>
                Tambah Imam
              </button>

              <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahDataLabel">Tambah Imam</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="nama_imam" class="col-form-label">Nama:</label>
                            <input type="text" required oninvalid="this.setCustomValidity('Nama Imam harus diisi..')" oninput="setCustomValidity('')" class="form-control" id="nama_imam" name="nama_imam">
                          </div>
                          <div class="form-group">
                            <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 120px"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="alamat" class="col-form-label">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                          </div>
                          <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="ex: imam@gmail.com" name="email">
                          </div>
                          <div class="form-group">
                            <label for="telp" class="col-form-label">No. Telepon:</label>
                            <input type="number" required oninvalid="this.setCustomValidity('No Telepon harus diisi..')" oninput="setCustomValidity('')" class="form-control" placeholder="ex: 081234567890" id="telp" name="telp">
                          </div>
                          <div class="form-group">
                            <label for="instagram" class="col-form-label">Instagram:</label>
                            <input type="text" class="form-control" id="instagram" placeholder="ex: https://www.instagram.com/imam" name="instagram">
                              <p class="text-start font-italic text-info ml-1">Kosongkan jika tidak mengisinya</p>
                          </div>
                          <div class="form-group">
                            <label for="facebook" class="col-form-label">Facebook:</label>
                            <input type="text" class="form-control" id="facebook" placeholder="ex: https://web.facebook.com/imam" name="facebook">
                              <p class="text-start font-italic text-info ml-1">Kosongkan jika tidak mengisinya</p>

                          </div>
                          <div class="form-group">
                            <label for="foto" class="col-form-label">Foto:</label>
                            <input type="file" required oninvalid="this.setCustomValidity('Foto Imam harus diisi..')" oninput="setCustomValidity('')" class="form-control" name="foto" id="foto" aria-describedby="foto" aria-label="Upload" name="foto">
                            <p class="text-start text-info ml-1">380px x 480px <span class="text-danger">[JPG, JPEG, PNG]</span></p>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success" name="tambahImam">Tambah Data</button>
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
                    <th>Nama Imam</th>
                    <th>Foto</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  <?php foreach ($resultImams as $row) : ?>
                    <tr class="text-center">
                      <td><?= $i++; ?></td>
                      <td><?= $row['nama_imam']; ?></td>
                      <td>
                        <img src="../../assets/img/imam/<?=$row['foto'];?>" width="100px" height="100px" style="object-fit: cover;" alt="">
                      </td>
                      <td><?= $row['alamat']; ?></td>
                      <td><?= $row['telp']; ?></td>
                      <td>
                        <a href="imam-detail?id=<?=$row['id_imam']?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square mr-1"></i>Edit</a>
                        <a href="hapus.php?titlePage=<?=$titlePage;?>&id=<?=$row['id_imam'];?>" class="btn btn-danger"><i class="fa-solid fa-trash mr-1"></i>Delete</a>
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
