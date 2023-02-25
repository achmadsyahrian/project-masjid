<?php 
$resultMasjid = query("SELECT * FROM masjid")[0];
?>
<!-- partial:partia/__footer.html -->
  <footer class="sigma_footer footer-2 sigma_footer-dark">

    <!-- Middle Footer -->
    <div class="sigma_footer-middle">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 footer-widget">
            <div class="sigma_footer-logo mb-4">
              <style>
            .sigma_footer-logo {
              display: flex;
              align-items: center;
            }

            .sigma_footer-logo a {
              font-size: 29px;
              font-weight: bold;
              color: #4caf50;
              text-decoration: none;
              /* text-shadow : 2px 2px 4px rgba(0, 0, 0, 0.4); */
              text-transform: uppercase;
            }

            @media only screen and (max-width: 768px) {
              .sigma_footer-logo a {
                font-size: 18px;
              }
            }
          </style>
              <a class="navbar-brand" href="index">
                <?= $resultMasjid['nama_masjid']; ?>
              </a>
            </div>
            <div class="d-flex align-items-center justify-content-start">
              <i class="far fa-phone custom-primary me-3"></i>
              <span><?= $resultMasjid['telp'] ? $resultMasjid['telp'] : "-"; ?></span>
            </div>
            <div class="d-flex align-items-center ustify-content-start mt-2">
              <i class="far fa-envelope custom-primary me-3"></i>
              <span><?= $resultMasjid['email'] ? $resultMasjid['email'] : "-"; ?></span>
            </div>
            <div class="d-flex align-items-center ustify-content-start mt-2">
              <i class="far fa-map-marker custom-primary me-3"></i>
              <span><?= $resultMasjid['alamat'] ? $resultMasjid['alamat'] : "-"; ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="sigma_footer-bottom">
      <div class="container-fluid">
        <div class="sigma_footer-copyright">
          <p> Copyright © Achmad Syahrian - <a href="#" class="text-white">2023</a> </p>
        </div>
        <ul class="sigma_sm square">
          <li>
            <a href="https://web.facebook.com/achmad.syahrian.1">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li>
            <a href="http://instagram.com/_achsyh_">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
          <li>
            <a href="http://wa.me/6289528126200">
              <i class="fab fa-whatsapp"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>

  </footer>
  <!-- partial -->