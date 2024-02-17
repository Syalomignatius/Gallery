<?php
include "Koneksi.php";
session_start();

$AlbumID=$_POST['AlbumID'];
$NamaAlbum=$_POST['NamaAlbum'];
$Deskripsi=$_POST['Deskripsi'];

$sql=mysqli_query($Koneksi,"update album set NamaAlbum='$NamaAlbum', Deskripsi='$Deskripsi' where AlbumID='$AlbumID'");

header("location:album.php");
?>