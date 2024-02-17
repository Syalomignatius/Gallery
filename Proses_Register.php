<?php
include "Koneksi.php";

$UserName=$_POST['Username'];
$Password=$_POST['Password'];
$Email=$_POST['Email'];
$NamaLengkap=$_POST['NamaLengkap'];
$Alamat=$_POST['Alamat'];
$sql=mysqli_query($Koneksi,"INSERT INTO user VALUES('', '$UserName', '$Password', '$Email', '$NamaLengkap', '$Alamat')");

if (!$sql) {
    die("Error: " . mysqli_error($Koneksi));
}
header("location:Login.php");
?>