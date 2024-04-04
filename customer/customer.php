<?php
session_start();

if ($_SESSION["level"] != "customer") {
  header("location:../index.php");
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <title>Hello, world!</title>
</head>

<body>

  <?php
  include '../koneksi.php';

  $sql = 'select * from film';
  $query = mysqli_query($koneksi, $sql);

  if (!$query) {
    die('SQL Error : ' . mysqli_error($koneksi));
  }
  ?>

  <!-- HEADER -->
  <header class="p-2 bg-dark text-white sticky-top">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <svg class="bi me-0" width="10" height="32" role="img" aria-label="Etiket">
          <img src="../assets/image/logo.png" width="150px">
        </svg>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li>
            <a href="customer.php" class="nav-link px-4 text-white">Home</a>
          </li>
          <li>
            <a href="#now" class="nav-link px-4 text-white">Now Playing</a>
          </li>
          <li>
            <a href="#soon" class="nav-link px-4 text-white">Coming Soon</a>
          </li>
        </ul>
        <div class="dropdown text-end">
          <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../assets/image/user.png" alt="mdo" width="50" height="50" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li>
              <a class="dropdown-item" href="profile.php">Profile</a>
            </li>
            <li>
              <a class="dropdown-item" href="../logout.php">Logout</a>
            </li>
          </ul>
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
                  <img class="card-img-top" src="../assets/image/<?= $fil['image']; ?>" alt="Card image cap" style="height: 430px;">
                  <div class="card-body">
                    <a href="pilih_film.php?id_film=<?= $fil['id_film']; ?>" class="btn btn-dark col-9">Beli Tiket</a>
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
                      <img src="../assets/image/dr strange.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-6">
                      <div class="card-body">
                        <h5 class="card-title">Judul Film</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        <a href="#" class="btn btn-outline-dark col-12" type="button">Detail</a>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="card mb-3 border-dark" style="max-width: 500px;">
                  <div class="row g-0">
                    <div class="col-md-6">
                      <img src="../assets/image/dr strange.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-6">
                      <div class="card-body">
                        <h5 class="card-title">Judul Film</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        <a href="#" class="btn btn-outline-dark col-12" type="button">Detail</a>
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

  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>