<?php
include "Koneksi.php";
session_start();

$FotoID=$_GET['FotoID'];

$sql=mysqli_query($Koneksi,"delete from foto where FotoID='$FotoID'");

header("location:Foto.php");
?>