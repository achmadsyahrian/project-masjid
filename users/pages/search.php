<?php
require 'functions.php';

if (isset($_GET['search'])) {
  $q = $_GET['q'];

  // Query pencarian video berdasarkan judul
  $query = "SELECT * FROM video WHERE judul LIKE '%$q%' ORDER BY tgl_post DESC";

  $dataVideo = mysqli_query($connect, $query);
} else {
  // Query semua video
  $query = "SELECT * FROM video ORDER BY tgl_post DESC";
  $dataVideo = mysqli_query($connect, $query);
}
?>
