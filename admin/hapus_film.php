<?php 

$id = $_GET['id_film'];

//include(dbconnect.php);
include('../koneksi.php');

//query hapus
$query = "DELETE FROM film WHERE id_film = '$id' ";

if (mysqli_query($koneksi , $query)) {
	# redirect ke index.php
	header("location:./data_film.php");
}
else{
	echo "ERROR, data gagal dihapus". mysqli_error($koneksi);
}

mysqli_close($koneksi);
