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
    <link rel="stylesheet" href="../assets/css/book_ticket.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Hello, world!</title>
</head>

<body>
    <?php
    $id = $_GET['id_tayang'];
    
    include('../koneksi.php');
    
    $data = "SELECT * FROM jadwal_tayang WHERE id_tayang='$id'";
    $list = mysqli_query($koneksi, $data);
    if (!$list) {
        die('SQL Error : ' . mysqli_error($koneksi));
    }
    
    $jadwal = mysqli_fetch_array($list);
    ?>

 <!-- HEADER -->
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-left justify-content-lg-start">
                <a href="../index.php"><img src="../assets/image/panah.png" width="60px"></a>
                <svg class="bi me-0" width="30" height="32" role="img" aria-label="Etiket">
                    <table>
                        <tr>
                            <td>
                                <h3 class="text-warning">GARUT XXI</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="text-warning"><?= $jadwal['tanggal']; ?> | <?= $jadwal['jam'];?></h6>
                            </td>
                        </tr>
                    </table>
                </svg>
            </div>
        </div>
    </header>
    <!-- END HEADER -->

    <main>
        <div class="container">
            <hr>
            <div class="row row-cols-4 offset-3">
                <div class="col-md-2">
                    <input type="checkbox" class="btn-check" id="btn-check-outlined-1" autocomplete="off">
                    <label class="btn btn-outline-dark" for="btn-check-outlined-1">A1</label><br>
                </div>
                <div class="col-md-2">
                    <input type="checkbox" class="btn-check" id="btn-check-outlined-2" autocomplete="off">
                    <label class="btn btn-outline-dark" for="btn-check-outlined-2">A2</label><br>
                </div>
                <div class="col-md-2">
                    <input type="checkbox" class="btn-check" id="btn-check-outlined-3" autocomplete="off">
                    <label class="btn btn-outline-dark" for="btn-check-outlined-3">A3</label><br>
                </div>
                <div class="col-md-2">
                    <input type="checkbox" class="btn-check" id="btn-check-outlined-4" autocomplete="off">
                    <label class="btn btn-outline-dark" for="btn-check-outlined-4">A4</label><br>
                </div>
            </div>
            <br />
            <div class="row row-cols-4 offset-3">
                <div class="col-md-2">
                    <input type="checkbox" class="btn-check" id="btn-check-outlined-5" autocomplete="off">
                    <label class="btn btn-outline-dark" for="btn-check-outlined-5">C1</label><br>
                </div>
                <div class="col-md-2">
                    <input type="checkbox" class="btn-check" id="btn-check-outlined-6" autocomplete="off">
                    <label class="btn btn-outline-dark" for="btn-check-outlined-6">C2</label><br>
                </div>
                <div class="col-md-2">
                    <input type="checkbox" class="btn-check" id="btn-check-outlined-7" autocomplete="off">
                    <label class="btn btn-outline-dark" for="btn-check-outlined-7">C3</label><br>
                </div>
                <div class="col-md-2">
                    <input type="checkbox" class="btn-check" id="btn-check-outlined-8" autocomplete="off">
                    <label class="btn btn-outline-dark" for="btn-check-outlined-8">C4</label><br>
                </div>
            </div>

            <br />

            <div class="row row-cols-4 offset-3">
                <div class="col-md-2">
                    <input type="checkbox" class="btn-check" id="btn-check-outlined-9" autocomplete="off">
                    <label class="btn btn-outline-dark" for="btn-check-outlined-9">E1</label><br>
                </div>
                <div class="col-md-2">
                    <input type="checkbox" class="btn-check" id="btn-check-outlined-10" autocomplete="off">
                    <label class="btn btn-outline-dark" for="btn-check-outlined-10">E2</label><br>
                </div>
                <div class="col-md-2">
                    <input type="checkbox" class="btn-check" id="btn-check-outlined-11" autocomplete="off">
                    <label class="btn btn-outline-dark" for="btn-check-outlined-11">E3</label><br>
                </div>
                <div class="col-md-2">
                    <input type="checkbox" class="btn-check" id="btn-check-outlined-12" autocomplete="off">
                    <label class="btn btn-outline-dark" for="btn-check-outlined-12">E4</label><br>
                    <br />
                </div>
            </div>


            <button class="screen" disabled>Layar Bioskop</button>
            <form method="POST" action="tes_cek.php">
            <div class="form-group">
            <div class="grid-container">
                <div class="left">
                    <h3 class="text-center mt-2">Harga</h3>
                    <input type="number" class="form-control mt-3" name="total_bayar" value="<?= $jadwal['harga']; ?>" disabled>
                </div>
                <div class="right">
                        <h4 class="text-center">Pilih Kursi</h4>
                        <select name="kursi" class="form-control">
                            <option value="A1">A1</option>
                            <option value="A2">A2</option>
                            <option value="A3">A3</option>
                            <option value="A4">A4</option>
                            <option value="C1">C1</option>
                            <option value="C2">C2</option>
                            <option value="C3">C3</option>
                            <option value="C4">C4</option>
                            <option value="E1">E1</option>
                            <option value="E2">E2</option>
                            <option value="E3">E3</option>
                            <option value="E4">E4</option>
                        </select>
                        </div>
                </div>
            </div>
                        <button type="submit" class="btn btn-dark col-6 mt-2 offset-3" name="order">Ringkasan Order</button>
                    </form>

                </div>
    </main>
</body>

</html>