<script src="../../assets/js/plugins/jquery-3.4.1.min.js"></script>
  <script src="../../assets/js/plugins/popper.min.js"></script>
  <script src="../../assets/js/plugins/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/imagesloaded.min.js"></script>
  <script src="../../assets/js/plugins/jquery.magnific-popup.min.js"></script>
  <script src="../../assets/js/plugins/jquery.countdown.min.js"></script>
  <script src="../../assets/js/plugins/jquery.waypoints.min.js"></script>
  <script src="../../assets/js/plugins/jquery.counterup.min.js"></script>
  <script src="../../assets/js/plugins/jquery.zoom.min.js"></script>
  <script src="../../assets/js/plugins/jquery.inview.min.js"></script>
  <script src="../../assets/js/plugins/jquery.event.move.js"></script>
  <script src="../../assets/js/plugins/wow.min.js"></script>
  <script src="../../assets/js/plugins/isotope.pkgd.min.js"></script>
  <script src="../../assets/js/plugins/slick.min.js"></script>
  <script src="../../assets/js/plugins/ion.rangeSlider.min.js"></script>

  <script src="../../assets/js/main.js"></script>

  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../../package/dist/sweetalert2.all.min.js"></script>

  <script>
    // LOGIN
    <?php if (isset($_SESSION['login'])) : ?>
      Swal.fire({
        title: 'Anda Berhasil Login!',
        text: '',
        icon: 'success'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'index';
        }
      });
      <?php unset($_SESSION['login']);endif; ?>

      // LOGIN GAGAL
      <?php if (isset($_SESSION['gagalLogin'])) : ?>
        Swal.fire({
          title: 'Anda Gagal Login!',
          text: 'Username atau Password Salah',
          icon: 'error'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'login';
          }
        });
        <?php unset($_SESSION['gagalLogin']);endif; ?>

      
      // LOGOUT
      <?php if (isset($_SESSION['logoutA'])) : ?>
      Swal.fire({
        title: 'Anda Berhasil Logout!',
        text: '',
        icon: 'success'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'login';
        }
      });
      <?php unset($_SESSION['logoutA']);endif; ?>

      // USER EDIT
      <?php if (isset($_SESSION['editProfile'])) : ?>
      Swal.fire({
        title: 'Data Telah Disimpan!',
        text: '',
        icon: 'success'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'profile';
        }
      });
      <?php unset($_SESSION['editProfile']);endif; ?>

      // REGISTER USER (username sudah terdaftar)
      <?php if (isset($_SESSION['userReady'])) : ?>
      Swal.fire({
        title: 'Akun Gagal Didaftar!',
        text: 'Username telah terdaftar',
        icon: 'error'
      });
      <?php unset($_SESSION['userReady']);endif; ?>
      
      // REGISTER USER BERHASIL
      <?php if (isset($_SESSION['register'])) : ?>
      Swal.fire({
        title: 'Akun Berhasil Didaftar!',
        text: '',
        icon: 'success'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'login';
        }
      });
      <?php unset($_SESSION['register']);endif; ?>
      
  </script>

  
