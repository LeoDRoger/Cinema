<?php
session_start();
include('../koneksi.php');
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <title>Hello, world!</title>
</head>

<body>

  <!-- HEADER -->
  <header class="p-2 bg-dark text-white sticky-top">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      
          <a href="customer.php"><img src="../assets/image/logo.png" width="130px"></a>
        

        <svg class="bi me-0" width="80%" height="32" role="img" aria-label="Etiket">
        </svg>
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
    <?php
    $currentuser = $_SESSION['username'];
    $sql = "select * from user where username='$currentuser'";

    $result = mysqli_query($koneksi, $sql);

    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
          //print_r($row['username']);
    ?>
          <div class="align-center">
            <h3 class="my-3 text-center">Update Informasi</h3>
            <div class="row mt-5">
              <div class="col-md-4 text-center">
                <img src="../assets/image/user2.png" alt="user" width="300px" class="rounded-circle">
                <h3 class="mt-2"><?php echo $row['nama']; ?></h3>
                <a href="beli_tiket.php" class="btn btn-primary mt-2 col-3">Tiket Anda</a>
              </div>

              <div class="col-md-8">

                <form action="cek_update.php" method="get">
                  <div class="form-group col-6">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control text-secondary" id="nama" name="nama" placeholder="Nama Lengkap" value="<?php echo $row['nama']; ?>">
                  </div>
                  <div class="form-group col-6">
                    <label for="email" class="form-label mt-2">Email</label>
                    <input type="email" class="form-control text-secondary" id="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>">
                  </div>
                  <div class="form-group col-6">
                    <label for="no_kontak" class="form-label mt-2">Nomor Handphone</label>
                    <input type="number" class="form-control text-secondary" id="no_kontak" name="no_kontak" placeholder="Nomor Telpon" value="<?php echo $row['no_kontak']; ?>">
                  </div>
                  <div class="form-group col-6">
                    <label for="username" class="form-label mt-2">Username</label>
                    <input type="text" class="form-control text-secondary" id="username" name="username" placeholder="Username" value="<?php echo $row['username']; ?>">
                  </div>
                  <div class="form-group col-6">
                    <label for="password" class="form-label mt-2">Password</label>
                    <input type="password" class="form-control text-secondary" id="password" name="password" placeholder="Password" value="<?php echo $row['password']; ?>"></input>
                  </div>
                  <hr class="mt-3 col-6">
                  <button class="btn btn-primary mb-3 col-2" type="submit">Update</button>

                </form>
              </div>
            </div>
          </div>
    <?php

        }
      }
    }
    ?>
  </main>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>