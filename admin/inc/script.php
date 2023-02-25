<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>

<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../../package/dist/sweetalert2.all.min.js"></script>

  <!-- FontAwesome -->
  <script src="https://kit.fontawesome.com/4dc3168260.js" crossorigin="anonymous"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": false,
      "lengthChange": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"],
      "language": {
        "zeroRecords": "Tidak ada hasil yang ditemukan",
        "emptyTable": "Tidak ada data :)"
      }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
    });
  });

  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Tombol yang membuka modal
    var nama = button.data('nama') // Ambil nilai dari atribut data-nama
    var username = button.data('username') // Ambil nilai dari atribut data-username
    var password = button.data('password') // Ambil nilai dari atribut data-password
    var id_user = button.data('iduser') // Ambil nilai dari atribut data-iduser
    var modal = $(this)

    // Isi nilai input field pada form modal dengan data yang diambil
    modal.find('#nama').val(nama)
    modal.find('#username').val(username)
    modal.find('#password').val(password)
    modal.find('#id_user').val(id_user)
  });


  
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
    });
  <?php unset($_SESSION['gagalLogin']);endif; ?>

  // LOGOUT
  <?php if (isset($_SESSION['logoutAdmin'])) : ?>
    Swal.fire({
      title: 'Anda Berhasil Logout!',
      text: '',
      icon: 'success'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'login';
    }
  });
  <?php unset($_SESSION['logoutAdmin']);endif; ?>

  // EDIT USER
  <?php if (isset($_SESSION['editUser'])) : ?>
    Swal.fire({
      title: 'Data Berhasil Disimpan!',
      text: '',
      icon: 'success'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'users';
    }
  });
  <?php unset($_SESSION['editUser']);endif; ?>

  // REGIS USER (username sudah terdaftar)
  <?php if (isset($_SESSION['userReady'])) : ?>
  Swal.fire({
    title: 'Akun Gagal Didaftar!',
    text: 'Username telah terdaftar',
    icon: 'error'
  });
  <?php unset($_SESSION['userReady']);endif; ?>

  // EDIT USER (username sudah terdaftar)
  <?php if (isset($_SESSION['ubahUserReady'])) : ?>
  Swal.fire({
    title: 'Akun Gagal Diubah!',
    text: 'Username telah terdaftar',
    icon: 'error'
  });
  <?php unset($_SESSION['ubahUserReady']);endif; ?>

  // HAPUS
  <?php if (isset($_SESSION['hapus'])) : ?>
    Swal.fire({
      title: 'Data Berhasil Dihapus!',
      text: '',
      icon: 'success'
  });
  <?php unset($_SESSION['hapus']);endif; ?>

  // TAMBAH USER
  <?php if (isset($_SESSION['tambahUser'])) : ?>
    Swal.fire({
      title: 'User Berhasil Ditambah!',
      text: '',
      icon: 'success'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'users';
    }
  });
  <?php unset($_SESSION['tambahUser']);endif; ?>

  // TAMBAH NEWS
  <?php if (isset($_SESSION['tambahNews'])) : ?>
    Swal.fire({
      title: 'News Berhasil Ditambah!',
      text: '',
      icon: 'success'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'news';
    }
  });
  <?php unset($_SESSION['tambahNews']);endif; ?>

  // UBAH NEWS
  <?php if (isset($_SESSION['ubahNews'])) : ?>
    Swal.fire({
      title: 'Data Berhasil Diubah!',
      text: '',
      icon: 'success'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'news';
    }
  });
  <?php unset($_SESSION['ubahNews']);endif; ?>

  // UBAH NEWS (gagal, OverSize Foto)
  <?php if (isset($_SESSION['overSize'])) : ?>
    Swal.fire({
      title: 'Data Gagal Diubah!',
      text: 'Ukuran foto terlalu besar',
      icon: 'error'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'news';
    }
  });
  <?php unset($_SESSION['overSize']);endif; ?>

  // UBAH MASJID
  <?php if (isset($_SESSION['ubahMasjid'])) : ?>
    Swal.fire({
      title: 'Data Berhasil Diubah!',
      text: '',
      icon: 'success'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'mosque';
    }
  });
  <?php unset($_SESSION['ubahMasjid']);endif; ?>

  // TAMBAH IMAM
  <?php if (isset($_SESSION['tambahImam'])) : ?>
    Swal.fire({
      title: 'Imam Berhasil Ditambah!',
      text: '',
      icon: 'success'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'imam';
    }
  });
  <?php unset($_SESSION['tambahImam']);endif; ?>

  // UBAH IMAM
  <?php if (isset($_SESSION['ubahImam'])) : ?>
    Swal.fire({
      title: 'Data Berhasil Diubah!',
      text: '',
      icon: 'success'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'imam';
    }
  });
  <?php unset($_SESSION['ubahImam']);endif; ?>

  // TAMBAH VIDEO
  <?php if (isset($_SESSION['tambahVideo'])) : ?>
    Swal.fire({
      title: 'Video Berhasil Ditambah!',
      text: '',
      icon: 'success'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'video';
    }
  });
  <?php unset($_SESSION['tambahVideo']);endif; ?>

  // UBAH IMAM
  <?php if (isset($_SESSION['ubahVideo'])) : ?>
    Swal.fire({
      title: 'Video Berhasil Diubah!',
      text: '',
      icon: 'success'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'video';
    }
  });
  <?php unset($_SESSION['ubahVideo']);endif; ?>

</script>
