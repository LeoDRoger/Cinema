<?php
include('../koneksi.php');
session_start();

$kursi = $_POST['kursi'];
$jml_kursi = 1;
$totbyr = 65000;
//query

$query =  "INSERT INTO tiket (id_tiket, kursi, jumlah_kursi, total_bayar) VALUES ('$id', '$kursi', '$jml_kursi','$totbyr')";

if (mysqli_query($koneksi, $query)) {

    header("location:order.php");
} else {
    echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
