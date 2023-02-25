<?php 
session_start();
if (!isset($_SESSION['id_admin'])) {
  header('Location:login');
}
require "functions.php";
$titlePage = "Users";

$resultUsers = query("SELECT * FROM users WHERE level = 'user' ");

if (isset($_POST['submit_edit'])) {
  editUser($_POST);
}

if (isset($_POST['tambahUser'])) {
  tambahUser($_POST);
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
                <i class="fa-solid fa-user-plus"></i>
                Tambah User
              </button>


              <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahDataLabel">Tambah User</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST">
                          <div class="form-group">
                            <label for="nama" class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" required oninvalid="this.setCustomValidity('Nama User harus diisi..')" oninput="setCustomValidity('')">
                          </div>
                          <div class="form-group">
                            <label for="username" class="col-form-label">Username:</label>
                            <input type="username" class="form-control" id="username" name="username" required oninvalid="this.setCustomValidity('Username harus diisi..')" oninput="setCustomValidity('')">
                          </div>
                          <div class="form-group">
                            <label for="password" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required oninvalid="this.setCustomValidity('Password harus diisi..')" oninput="setCustomValidity('')">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success" name="tambahUser">Tambah Data</button>
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
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th style="width:20px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  <?php foreach ($resultUsers as $row) : ?>
                    <tr class="text-center">
                      <td><?= $i++; ?></td>
                      <td><?= $row['nama_user']; ?></td>
                      <td><?= $row['username']; ?></td>
                      <td><span class="badge bg-success px-3"><?= ucfirst($row['level']); ?></span></td>
                      <td>
                      <form action="" method="POST">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-nama="<?= $row['nama_user'] ?>" data-username="<?= $row['username'] ?>" data-iduser="<?= $row['id_user'] ?>" data-password="">
                        <i class="fa-solid fa-pen-to-square mr-1"></i>
                          Edit
                        </button>
                        <a href="hapus.php?titlePage=<?=$titlePage;?>&id=<?=$row['id_user'];?>" class="btn btn-danger">
                        <i class="fa-solid fa-trash mr-1"></i>
                          Delete
                        </a>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body text-left">
                                <div class="form-group">
                                  <label for="nama" class="col-form-label">Nama:</label>
                                  <input type="text" class="form-control" id="nama" name="nama_user" value="<?= $row['nama_user'] ?>" required oninvalid="this.setCustomValidity('Nama User harus diisi..')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                  <label for="username" class="col-form-label">Username:</label>
                                  <input type="text" class="form-control" id="username" name="username" value="<?= $row['username'] ?>" required oninvalid="this.setCustomValidity('Username harus diisi..')" oninput="setCustomValidity('')">
                                  <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $row['id_user'] ?>">
                                </div>
                                <div class="form-group">
                                  <label for="password" class="col-form-label">Password:</label>
                                  <input type="password" class="form-control" placeholder="Kosongkan jika tidak ingin merubahnya" id="password" name="password">
                                  <input type="hidden" class="form-control" id="text" name="passwordLama" value="<?=$row['password']?>">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit_edit">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
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
