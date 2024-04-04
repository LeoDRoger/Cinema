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
    $id = $_GET['id_film'];

    //koneksi database
    include('../koneksi.php');

    //query
    $query = "SELECT * FROM jadwal_tayang join film on film.id_film=jadwal_tayang.id_film WHERE jadwal_tayang.id_film='$id'";
    $result = mysqli_query($koneksi, $query);
    $film = mysqli_fetch_array($result);

    if (!$film) {
        die('SQL Error : ' . mysqli_error($koneksi));
    }
    ?>
    <!-- HEADER -->
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-left justify-content-lg-start">
                <a href="customer.php"><img src="../assets/image/panah.png" width="55px"></a>
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
                    <div class="mt-3">
                    <h5><?= $film['judul_film']; ?></h5>
                        <div class="row">
                            <div class="col-md-4">
                            <h6 class="text-muted">Genre</h6>
                            </div>
                            <div class="col-md-8">
                            <?= $film['genre']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <h6 class="text-muted">Tahun Tayang</h6>
                            </div>
                            <div class="col-md-8">
                            <?= $film['tahun_tayang']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <h6 class="text-muted">Durasi</h6>
                            </div>
                            <div class="col-md-8">
                            <?= $film['durasi_tayang']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <h6 class="text-muted">Sutradara</h6>
                            </div>
                            <div class="col-md-8">
                            <?= $film['sutradara']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <h6 class="text-muted">Rating Usia</h6>
                            </div>
                            <div class="col-md-8">
                            <?= $film['rating_usia']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <h6 class="text-muted">Sinopsis</h6>
                            </div>
                            <div class="col-md-8">
                            <?= $film['sinopsis']; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <br>
        <hr>
        <section>
        <div class="container">
        <div class="table-responsive">
        <h4 class="text-center">Jadwal Tayang</h4>
            <hr>
            <table class="table table-striped table-hover" id="data_film">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Harga</th>
                        <th scope="col"></th>
                        
                    </tr>
                </thead>
                <tbody class="text-center">
                <?php
                    foreach($result as $jadwal) : 
                    ?>
                        <tr class="text-left">
                            <td><?= $jadwal['tanggal']; ?></td>
                            <td><?= $jadwal['jam']; ?> WIB</td>
                            <td>Rp. <?= $jadwal['harga']; ?></td>
                            <td><a href="pilih_kursi.php?id_tayang=<?= $jadwal['id_tayang']; ?>" class="btn btn-dark col-6">Beli Tiket</a></td>
                        </tr>
                    <?php endforeach
                     ?>
                </tbody>
            </table>
        </div>
        </div>
        </section>
    </main>
    <!-- END MAIN -->

</body>

</html>