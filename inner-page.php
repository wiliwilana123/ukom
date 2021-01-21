<?php
  session_start();
  include 'conn.php';
  $q_pasien = mysqli_query($conn, "SELECT * FROM pasien");
  $q_pasien2 = mysqli_query($conn, "SELECT * FROM pasien");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Unduh Hasil Tes</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script type="text/javascript" src="assets/js/Chart.js"></script>

  <!-- =======================================================
  * Template Name: Medicio - v2.1.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <i class="icofont-clock-time"></i> Wili Wilana J3C418196
      </div>
      <div class="d-flex align-items-center">
        <i class="icofont-phone"></i> Call us now +628-2246-191286
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo mr-auto">Corona Update</a>
    
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo mr-auto"><a href="index.html">Medicio</a></h1> -->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          
        </ul>
      </nav><!-- .nav-menu -->

      <a href="index.php" class="appointment-btn scrollto"><span class="d-none d-md-inline"> </span> Kembali ke Home</a>
     
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Unduh Hasil Tes</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Inner Page</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <div style="width: 500px;height: 500px">
          <canvas id="myChart"></canvas>
        </div>
        <?php 
          $desa_all= "";
          $umur_all=null;
          while ($row = mysqli_fetch_array($q_pasien2)) { 
            $desa=$row['desa_pasien'];
            $desa_all .= "'$desa'". ", ";

            $umur=$row['umur_pasien'];
            $umur_all .= "'$umur'". ", ";

          }
        ?>
        <script>
          var ctx = document.getElementById("myChart").getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: [<?php echo $desa_all; ?>],
              datasets: [{
                label: 'Data Pasien',
                data: [<?php echo $umur_all; ?>],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero:true
                  }
                }]
              }
            }
          });
        </script>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Pasien</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Desa</th>
                <th>Riwayat</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              while($data = mysqli_fetch_assoc($q_pasien)){
            ?>
              <tr>
                <td><?php echo $data['id_pasien']; ?></td>
                <td><?php echo $data['nama_pasien']; ?></td>
                <td><?php echo $data['umur_pasien']; ?></td>
                <td><?php echo $data['alamat_pasien']; ?></td>
                <td><?php echo $data['kota_pasien']; ?></td>
                <td><?php echo $data['desa_pasien']; ?></td>
                <td><?php echo $data['riwayat_pasien']; ?></td>
              </tr>
            <?php } ?>
            </tbody>
            </table>
        </div>
        <a href="export.php"><button type="button" class="btn btn-primary">Unduh hasil test</button></a>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-md-6">
            <div class="footer-info">
              <h3>Corona Update</h3>
              <p>
                Bogor <br>
                Jawa Barat<br><br>
                <strong>Phone:</strong> +628-2246-191286<br>
                <strong>Email:</strong> wili_wilana@apps.ipb.ac.id<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          

          

          

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Wili Wilana</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
        
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>
