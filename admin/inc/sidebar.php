<?php 
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4 " style="background-color:#265728">
    <!-- Brand Logo -->
    <a href="index" class="brand-link">
      <img src="../../users/inc/favicon.ico" alt="Mosque Logo" class=" brand-image img-circle elevation-3" style="">
      <span class="brand-text font-weight-normal">Admin | Al- Manar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          <li class="nav-header">PAGES</li>
          <li class="nav-item ">
            <a href="index" class="nav-link <?php if($titlePage === "Dashboard") {echo "bg-success";}?>">
              <i class="nav-icon fa-solid fa-house"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-header">OPERATIONS</li>
          <li class="nav-item ">
            <a href="mosque" class="nav-link <?php if($titlePage === "Mosque") {echo "bg-success";}?>">
              <i class="fa fa-mosque nav-icon" aria-hidden="true"></i>
              <p>Mosque</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="users" class="nav-link <?php if($titlePage === "Users") {echo "bg-success";}?>">
              <i class="fa fa-users nav-icon" aria-hidden="true"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="news" class="nav-link <?php if($titlePage === "News") {echo "bg-success";}?>">
              <i class="nav-icon fa-solid fa-newspaper"></i>
              <p>News</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="video" class="nav-link <?php if($titlePage === "Video") {echo "bg-success";}?>">
              <i class="nav-icon fa-solid fa-video"></i>
              <p>Video</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="imam" class="nav-link <?php if($titlePage === "Imams") {echo "bg-success";}?>">
              <i class="nav-icon fa-solid fa-user"></i>
              <p>Imam</p>
            </a>
          </li>
          <li class="nav-header">AUTENTIKASI</li>
          
          <li class="nav-item ">
            <a href="logout" class="nav-link">
              <i class="nav-icon fa fa-share-square" aria-hidden="true"></i>
              <p>
                Logout
              </p>
            </a>

          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>