<?php 
session_start();
if ($_GET['titlePage'] == "Users") {
  $table = 'users';
  $idDb = 'id_user';
} elseif ($_GET['titlePage'] == "News") {
  $table = 'news';
  $idDb = 'id_news';
} elseif ($_GET['titlePage'] == "Mosque") {
  $table = 'news';
  $idDb = 'id_news';
} elseif ($_GET['titlePage'] == "Imams") {
  $table = 'imam';
  $idDb = 'id_imam';
} elseif ($_GET['titlePage'] == "Video") {
  $table = 'video';
  $idDb = 'id_video';
}

require "functions.php";

$id = $_GET['id'];

if (hapus($id, $table, $idDb) > 0) {
  echo "
    <script>
      document.location.href = '$table';
    </script>
    ";
}




?>