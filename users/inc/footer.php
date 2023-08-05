<?php 
$resultMasjid = query("SELECT * FROM masjid")[0];
?>
<!-- partial:partia/__footer.html -->
  <footer class="sigma_footer footer-2 sigma_footer-dark">

    <!-- Middle Footer -->
    <div class="sigma_footer-middle">
      <div class="container">
        <div class="row">
          <div class="col-md-6 footer-widget">
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
          <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31855.24445219327!2d98.7595180883008!3d3.609083862029277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303136af521bb501%3A0x107ccbb79e35de7d!2sGg.%20Mispon%2C%20Kec.%20Percut%20Sei%20Tuan%2C%20Kabupaten%20Deli%20Serdang%2C%20Sumatera%20Utara%2020371!5e0!3m2!1sid!2sid!4v1677463706669!5m2!1sid!2sid" width="600" height="200px" style="border:4px solid green; border-radius:10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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