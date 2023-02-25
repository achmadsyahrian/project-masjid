<?php 
$resultMasjid = query("SELECT * FROM masjid")[0];

?>

<header class="sigma_header header-4 can-sticky header-absolute">

    <!-- Middle Header Start -->
    <div class="sigma_header-middle">
      <div class="container-fluid">
        <nav class="navbar">
          <!-- Logo Start -->
          <style>
            .sigma_logo-wrapper {
              display: flex;
              align-items: center;
            }

            .sigma_logo-wrapper a {
              font-size: 29px;
              font-weight: bold;
              color: #4caf50;
              text-decoration: none;
              /* text-shadow : 2px 2px 4px rgba(0, 0, 0, 0.4); */
              text-transform: uppercase;
            }

            @media only screen and (max-width: 768px) {
              .sigma_logo-wrapper a {
                font-size: 18px;
              }
            }

          </style>
          <div class="sigma_logo-wrapper">
            <a class="navbar-brand" href="index">
              <?= $resultMasjid['nama_masjid']; ?>
            </a>
          </div>
          <!-- Logo End -->

          <!-- Menu -->
          <?php include('navbar.php'); ?>

          <!-- Controls -->
          <div class="sigma_header-controls style-2">
            
            <ul class="sigma_header-controls-inner">
              
              <!-- Desktop Toggler -->
              <li class="aside-toggler style-2 aside-trigger-right desktop-toggler">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </li>

              <!-- Mobile Toggler -->
              <li class="aside-toggler style-2 aside-trigger-left">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </li>
            </ul>

          </div>

        </nav>
      </div>
    </div>
    <!-- Middle Header End -->

  </header>