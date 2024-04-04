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
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Hello, world!</title>
</head>

<body>
    <?php
    $id = 1002356801;

    //koneksi database
    include('../koneksi.php');

    //query
    $data = "SELECT * FROM tiket";
    $query = "SELECT * FROM jadwal_tayang join film on film.id_film=jadwal_tayang.id_film WHERE jadwal_tayang.id_film='$id'";
    $result = mysqli_query($koneksi, $query);
    $list = mysqli_query($koneksi, $data);
    $film = mysqli_fetch_array($result);

    if (!$film) {
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


            </div>
        </div>
    </header>
    <!-- END HEADER -->

    <main>
        <div class="card mb-3 border-dark mt-5 offset-3" style="max-width: 600px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../assets/image/<?= $film['image']; ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="mt-2">
                            <h4 class="text-center">GARUT XXI</h4>
                            <hr>
                            <h5><?= $film['judul_film']; ?></h5>
                            <div class="row">
                                <div class="col-md-8">
                                    <?= $film['rating_usia']; ?>
                                </div>
                            </div>
                            <?php foreach ($result as $jadwal) :
                            ?>
                                <div class="row">
                                    <div class="col-md-8">
                                        GARUT XXI, REGULAR, STUDIO <?= $jadwal['id_studio']; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <?= $jadwal['tanggal']; ?>, <?= $jadwal['jam']; ?>
                                    </div>
                                </div>

                            <?php endforeach ?>
                            <div class="row">
                            </div>
                            <?php
                            foreach ($list as $tiket) :
                            ?>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6>Kode Tiket</h6>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted"><?= $tiket['id_tiket']; ?></h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h6>Kode Seat</h6>
                                        </div>
                                        <div class="col-md-8">
                                            <h6><?= $tiket['kursi']; ?></h6>
                                        </div>
                                    </div>
                                <?php
                            endforeach ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h6 class="text-center text-muted"><i>** Tunjukan tiket pada petugas studio</i></h6>
        </div>
        <br>
    </main>
    <!-- END MAIN -->

</body>

</html>