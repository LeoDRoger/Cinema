<?php
//add dbconnect

include('../koneksi.php');

$judul_film = $_POST['judul_film'];
$genre = $_POST['genre'];
$sutradara = $_POST['sutradara'];
$rating = $_POST['rating_usia'];
$sinopsis = $_POST['sinopsis'];
$durasi = $_POST['durasi_tayang'];
$tahun = $_POST['tahun_tayang'];
$image = $_POST['image'];
//query

$query ="INSERT INTO film (judul_film, genre, sutradara, rating_usia, sinopsis, durasi_tayang, tahun_tayang, image) VALUES ('$judul_film', '$genre', '$sutradara', '$rating', '$sinopsis', '$durasi', '$tahun', '$image')";

if (mysqli_query($koneksi, $query)) {

    header("location:data_film.php");
} else {
    echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
