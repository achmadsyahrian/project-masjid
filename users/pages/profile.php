<?php 
session_start();
if (!isset($_SESSION['id_user'])) {
	header("location:index");
}	

require "functions.php";

$titlePage = "My Profile";

$id_user = $_SESSION['id_user'];
$dataUser = query("SELECT * FROM users WHERE id_user = $id_user")[0];

if (isset($_POST['simpan'])) {
  editProfile($_POST);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from slidesigma.com/themes/html/mircco/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 15:26:15 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

  <?php include('../inc/head.php'); ?>

<body>

  <?php include('../inc/preloader.php'); ?>

  <!-- partial:partia/__mobile-nav.html -->
  <?php include('../inc/mobile-nav.php'); ?>
  <!-- partial -->

  <!-- partial:partia/__header.html -->
  <?php include('../inc/header.php'); ?>
  <!-- partial -->

  <!-- Banner Start -->
  <?php include('../inc/sub-header.php'); ?>
  <!-- Banner End --> 


   <!-- Post Content Start -->
  <div class="section sigma_post-single">
    <div class="container">

      <div class="row">

        <div class="col-12">

            <div class="entry-content">
              <div class="sigma_volunteer-detail mb-5">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="sigma_volunteer-detail-inner mt-5 mt-lg-0 ps-0 ps-lg-4">
                      <h3 class="sigma_member-name"><?= $dataUser['nama_user']; ?></h3>
                      <span class="sigma_volunteer-detail-category">User</span>
                      <ul class="sigma_volunteer-detail-info">
                        <li>
                          <i class="far fa-user"></i>
                          <span class="title">Nama:</span><?= $dataUser['nama_user']; ?>
                        </li>
                      </ul>
                      <ul class="sigma_volunteer-detail-info">
                        <li>
                          <i class="fas fa-envelope"></i>
                          <span class="title">username:</span><?= $dataUser['username']; ?>
                        </li>
                      </ul>
                      <ul>
                        <li>
                          <button type="button" class="btn btn-success w-100 my-4" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                            Edit Profile
                          </button>
                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                      <label for="nama" class="col-form-label">Nama:</label>
                                      <input type="text" name="nama" required class="form-control" id="nama" value="<?= $dataUser['nama_user']; ?>">
                                      <input type="hidden" name="id_user" required class="form-control" value="<?= $dataUser['id_user']; ?>">
                                    </div>
                                    <div class="mb-3">
                                      <label for="username" class="col-form-label">Username:</label>
                                      <input type="username" name="username" required class="form-control" id="username" value="<?= $dataUser['username']; ?>">
                                    </div>
                                    <div class="mb-3">
                                      <label for="recipient-name" class="col-form-label">Password:</label>
                                      <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin merubahnya" id="recipient-name">
                                      <input type="hidden" name="passwordLama" required class="form-control" id="username" value="<?= $dataUser['password']; ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-success" name="simpan">Save Changes</button>
                                </div>
                                  </form>
                              </div>
                            </div>
                          </div>
                        </li>

                      </ul>
                    </div>
                  </div>
                </div>
              </div>
        </div>

      </div>

    </div>
  </div>
</div>
  <!-- Post Content End -->

  <?php include('../inc/footer.php') ?>

  <!-- partial:partia/__scripts.html -->
  <?php include('../inc/script.php'); ?>
  <!-- partial -->

</body>


<!-- Mirrored from slidesigma.com/themes/html/mircco/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 15:28:10 GMT -->
</html>
