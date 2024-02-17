<?php
session_start();
include "Koneksi.php";
$NamaAlbum = $_POST['NamaAlbum'];
$Deskripsi = $_POST['Deskripsi'];
$TanggalDibuat = date("Y-m-d");
$UserID = $_SESSION['UserID'];

$sql = mysqli_query($Koneksi, "INSERT INTO album (NamaAlbum,Deskripsi,TanggalDibuat,UserID) VALUES('$NamaAlbum', '$Deskripsi', '$TanggalDibuat', '$UserID')");

if (!$sql) {
    die("Error: " . mysqli_error($Koneksi));
}

header("location:Album.php");

?>