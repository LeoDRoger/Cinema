<?php
session_start();
    include 'koneksi.php';

    $sql = 'select * from film';
    $query = mysqli_query($koneksi, $sql);

    if (!$query) {
        die('SQL Error : ' . mysqli_error($koneksi));
    }
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <title>Hello, world!</title>
</head>

<body>
  <!-- HEADER -->
  <header class="p-2 bg-dark text-white sticky-top">
    <div class="container" id="hum">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <svg class="bi me-0" width="40" height="32" role="img" aria-label="Etiket">
          <img src="assets/image/logo.png" width="150px">
        </svg>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li>
            <a href="#now" class="nav-link px-4 text-white">Now Playing</a>
          </li>
          <li>
            <a href="#soon" class="nav-link px-4 text-white">Coming Soon</a>
          </li>
        </ul>
        <div class="text-end">
          <a href="login.php" type="button" class="btn btn-outline-light me-3">Login</a>
          <a href="./customer/registrasi_cus.php" type="button" class="btn btn-warning">Register</a>
        </div>
      </div>
    </div>
  </header>
  <!-- END HEADER -->
  <main>
    <!-- NOW PLAYING CONTENT -->
    <div class="container">
    <br>
    <h1 id="now">Now Playing</h1>
    <br>
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="d-flex flex-row justify-content-between text-center">
            <?php
              while ($fil = mysqli_fetch_array($query)) { ?>
              <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="./assets/image/<?= $fil['image']; ?>" alt="Card image cap" style="height: 430px;">
                <div class="card-body ">
                  <a href="./login.php" class="btn btn-dark col-9">Beli Tiket</a>
                </div>
              </div>
              <?php
              } ?>
            </div>
          </div>
      </div>
    </div>
    <!-- END NOW PLAYING CONTENT -->

    <!-- COMING SOON CONTENT -->
    <br>
    <br>
    <div class="container">
    <br>
    <h1 id="soon">Coming Soon</h1>
    <br>
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">

            <div class="d-flex flex-row align-items-center justify-content-between">
              <div class="card mb-3 border-dark" style="max-width: 500px;">
                <div class="row g-0">
                  <div class="col-md-6">
                    <img src="assets/image/dr strange.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Judul Film</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      <a href="$" class="btn btn-outline-dark col-12" type="button">Detail</a>
                    </div>
                  </div>
                </div>
              </div>


              <div class="card mb-3 border-dark" style="max-width: 500px;">
                <div class="row g-0">
                  <div class="col-md-6">
                    <img src="assets/image/dr strange.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">Judul Film</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      <a href="$" class="btn btn-outline-dark col-12" type="button">Detail</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          
          </div>
        </div>
      </div>
    </div>
    <!-- END NOW PLAYING CONTENT -->
  </main>
  <!-- END MAIN -->

  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>