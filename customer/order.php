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
    
    $data= "SELECT * FROM tiket";
    $query = "SELECT * FROM jadwal_tayang join film on film.id_film=jadwal_tayang.id_film WHERE jadwal_tayang.id_film='$id'";
    $result = mysqli_query($koneksi, $query);
    $list= mysqli_query($koneksi, $data);
    $film = mysqli_fetch_array($result);

    if (!$film) {
        die('SQL Error : ' . mysqli_error($koneksi));
    }
    ?>
    <!-- HEADER -->
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-left justify-content-lg-start">
                <a href="pilih_kursi.php"><img src="../assets/image/panah.png" width="55px"></a>
                <svg class="bi me-0" width="40" height="32" role="img" aria-label="Etiket">
                    <h3 class="text-warning"><?= $film['judul_film']; ?></h3>
                </svg>
            </div>
        </div>
    </header>
    <!-- END HEADER -->

    <main>
        <div class="align-center">
            <div class="row mt-5">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="card shadow-lg mb-3 text-center" style="width: 18rem;">
                        <img class="card-img-top" src="../assets/image/<?= $film['image']; ?>" alt="Card image cap" style="height: 430px;">
                    </div>
                </div>

                <div class="col-md-4">
                    <hr>
                    <div class="mt-3">
                    <h5><?= $film['judul_film']; ?></h5>
                        <div class="row">
                            <div class="col-md-8">
                            <?=$film['rating_usia'];?>
                            </div>
                        </div>
                    <?php foreach($result as $jadwal):
                    ?>
                        <div class="row">
                            <div class="col-md-8">
                            GARUT XXI, REGULAR, STUDIO <?=$jadwal['id_studio'];?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                            <?= $jadwal['tanggal']; ?>, <?=$jadwal['jam'];?>
                            </div>
                        </div>

                        <?php endforeach ?>
                        <div class="row">
                        </div>
                        <?php
              while ($tiket = mysqli_fetch_array($list)) { ?>
              <hr>
                        <div class="row">
                            <div class="col-md-8">
                            <h6>Detail Transaksi</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <h6 class="text-muted">1 Tiket</h6>
                            </div>
                            <div class="col-md-8">
                            <?= $tiket['kursi']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <h6 class="text-muted">Kursi Reguler</h6>
                            </div>
                            <div class="col-md-8">
                            <h6 class="text-muted">Rp. <?= $tiket['total_bayar']; ?>  x 1</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <h6 class="text-muted">Biaya Layanan</h6>
                            </div>
                            <div class="col-md-8">
                            <h6 class="text-muted">Rp. 3000 x 1</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col-md-4">
                            <h5 class="text-muted">Total Bayar</h5>
                            </div>
                            <div class="col-md-8">
                            <h5>Rp. 68.000</h5>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <a href="beli_tiket.php " class="btn btn-dark">Bayar Sekarang</a>
                        </div>
                        <?php 
                    } ?>

                    </div>
                </div>
                <h6 class="text-center text-muted"><i>** Silahkan konfirmasi pembayaran pada petugas dalam jangka waktu 2 jam</i></h6>
                <div class="col-md-2"></div>
            </div>
        </div>
        <br>
        <hr>
    </main>
    <!-- END MAIN -->

</body>
</html>