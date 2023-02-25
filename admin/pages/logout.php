<?php 

session_start();
if (!isset($_SESSION['id_admin'])) {
  header('Location:login');
}

$_SESSION = [];
session_unset();
session_destroy();

header('Location: login.php?logoutAdmin=1');
exit;

?>