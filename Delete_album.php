<?php
include "Koneksi.php";
session_start();

$AlbumID=$_GET['AlbumID'];

$sql=mysqli_query($Koneksi,"delete from album where AlbumID='$AlbumID'");

header("location:album.php");
?>