<?php
include "Koneksi.php";
session_start(); 

$UserName=$_POST['Username'];
$Password=$_POST['Password'];

$sql=mysqli_query($Koneksi,"select * from user where username= '$UserName' and password='$Password'");

$cek=mysqli_num_rows($sql);

if($cek=1){
    while($data=mysqli_fetch_array($sql)){
        $_SESSION['UserID']=$data['UserID'];
        $_SESSION['NamaLengkap']=$data['NamaLengkap'];
    }
    header("location:Home.php");
}else{
header("location:Login.php");
}
?>