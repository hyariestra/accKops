<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Pitu Jogja Wisata - Solusi Pejalanan Anda</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- styles -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="assets/css/docs.css" rel="stylesheet">
  <link href="assets/css/prettyPhoto.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/flexslider.css" rel="stylesheet">
  <link href="assets/css/sequence.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/default.css" rel="stylesheet">
  <link href="assets/plugins/noUiSlider-13.1.4/documentation/assets/base.css?v=1" rel="stylesheet">
  <link href="assets/plugins/noUiSlider-13.1.4/documentation/assets/prism.css" rel="stylesheet">
  <link href="assets/plugins/noUiSlider-13.1.4/distribute/nouislider.min.css?v=1314" rel="stylesheet">

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/noUiSlider-13.1.4/documentation/assets/wNumb.js"></script>
  <script src="assets/plugins/noUiSlider-13.1.4/distribute/nouislider.min.js?v=1314"></script>

</head>

<body>
  <header>
    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <!-- logo -->
          <a class="brand logo" href="<?php echo base_url()?>"><img src="assets/img/logo.png" alt=""></a>
          <!-- end logo -->
          <!-- top menu -->
          <div class="navigation">
            <nav>
              <ul class="nav topnav">
                <?php
                  $strAktifHome = $aktif == 'home' ? "active" : "";
                  $strAktifDaftar = $aktif == 'daftar' ? "active" : "";
                  $strAktifGaleri = $aktif == 'galeri' ? "active" : "";
                  $strAktifKontak = $aktif == 'kontak' ? "active" : "";
                ?>
                <li class="dropdown <?php echo $strAktifHome?>">
                  <a href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="dropdown <?php echo $strAktifDaftar?>">
                  <a href="<?php echo base_url()."daftar?IDKategori=all&IDTujuan=all&harga=all"?>">Daftar Paket</a>
                </li>
                <li class="dropdown <?php echo $strAktifGaleri?>">
                  <a href="<?php echo base_url()."galeri"?>">Galeri</a>
                </li>
                <li class="dropdown <?php echo $strAktifKontak?>">
                  <a href="<?php echo base_url()."kontak"?>">Kontak Kami</a>
                </li>
              </ul>
            </nav>
          </div>
          <!-- end menu -->
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->

  <?php echo $content?>

  <!-- Footer
 ================================================== -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="span4">
          <div class="widget">
            <h5>Browse pages</h5>
            <ul class="regular">
              <li><a href="#">Work for us</a></li>
              <li><a href="#">Creative process</a></li>
              <li><a href="#">Case study</a></li>
              <li><a href="#">Scaffold awwards</a></li>
              <li><a href="#">Meet the team</a></li>
            </ul>
          </div>
        </div>
        <div class="span4">
          <div class="widget">
            <h5>Recent blog posts</h5>
            <ul class="regular">
              <li><a href="#">Lorem ipsum dolor sit amet</a></li>
              <li><a href="#">Mea malis nominavi insolens ut</a></li>
              <li><a href="#">Minim timeam has no aperiri sanctus ei mea per pertinax</a></li>
              <li><a href="#">Te malorum dignissim eos quod sensibus</a></li>
            </ul>
          </div>
        </div>
        <div class="span4">
          <div class="widget">
            <!-- logo -->
            <a class="brand logo" href="index.html">
              <img src="assets/img/logo-dark.png" alt="">
            </a>
            <!-- end logo -->
            <address>
              <strong>Registered Companyname, Inc.</strong><br>
               8895 Somename Ave, Suite 600<br>
               San Francisco, CA 94107<br>
              <abbr title="Phone">P:</abbr> (123) 456-7890
            </address>
          </div>
        </div>
      </div>
    </div>
    <div class="verybottom">
      <div class="container">
        <div class="row">
          <div class="span6">
            <p>
              &copy; Pitu Jogja Wisata - All right reserved
            </p>
          </div>
          <div class="span6">
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Serenity
              -->
              Designed by <a href="">IndoCreator</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- JavaScript Library Files -->
  <script src="assets/js/jquery.easing.js"></script>
  <script src="assets/js/google-code-prettify/prettify.js"></script>
  <script src="assets/js/modernizr.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/jquery.elastislide.js"></script>
  <script src="assets/js/sequence/sequence.jquery-min.js"></script>
  <script src="assets/js/sequence/setting.js"></script>
  <script src="assets/js/jquery.prettyPhoto.js"></script>
  <script src="assets/js/application.js"></script>
  <script src="assets/js/jquery.flexslider.js"></script>
  <script src="assets/js/hover/jquery-hover-effect.js"></script>
  <script src="assets/js/hover/setting.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="assets/js/custom.js"></script>

</body>
</html>