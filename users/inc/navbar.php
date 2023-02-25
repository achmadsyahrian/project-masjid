<?php 
if (isset($_POST['logout'])) {
  logout();
}
?>

<ul class="navbar-nav">
  <li class="menu-item"> <a class="<?php if($titlePage === "Home") {echo "text-success";}?>" href="index">Home</a></li>
  <li class="menu-item"> <a class="<?php if($titlePage === "About") {echo "text-success";}?>" href="about">About</a></li>
  <li class="menu-item"> <a class="<?php if($titlePage === "News") {echo "text-success";}?>" href="news">News</a></li>
  <li class="menu-item"> <a class="<?php if($titlePage === "Videos") {echo "text-success";}?>" href="videos">Videos</a></li>
  <li class="menu-item"> <a class="<?php if($titlePage === "Imam") {echo "text-success";}?>" href="imam">Imam</a></li>
  <?php if(isset($_SESSION['id_user'])) : ?>
    <li class="menu-item"> <a class="<?php if($titlePage === "My Profile") {echo "text-success";}?>" href="profile">My Profile</a></li>
  <?php endif; ?>

  <?php if(isset($_SESSION['id_user'])) : ?>
    <li class="menu-item"> 
      <form method="POST">
        <button class="btn btn-success btn-outline-success btn-sm text-light" name="logout" style="font-size:13px; ">LOGOUT</button>
      </form>
    </li>
  <?php else : ?>
    <li class="menu-item"> 
      <span class="badge rounded bg-success text-muted">
        <a class="text-light d-flex " style="font-size:13px" href="login">LOGIN</a>
      </span>
    </li>
  <?php endif; ?>
  <!-- <li class="menu-item"> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li>
  <li class="menu-item"> <a href="#"> <i class="fab fa-twitter"></i> </a> </li>
  <li class="menu-item"> <a href="#"> <i class="fab fa-instagram"></i> </a> </li> -->
</ul>