<?php
include "Koneksi.php";
session_start();

$JudulFoto=$_POST['JudulFoto'];
$DeskripsiFoto=$_POST['DeskripsiFoto'];
$AlbumID=$_POST['AlbumID'];

if($_FILES['LokasiFile']['name']!=""){
    $rand= rand();
    $extention = array('png','PNG','JPG','jpg','JPEG','jpeg','gif','GIF');
    $filename = $_FILES['LokasiFile']['name'];
    $size = $_FILES['LokasiFile']['size'];
    $ext =pathinfo($filename,PATHINFO_EXTENSION);

    if(!in_array($ext,$extention) ){
        header("location:Foto.php");
    }else{
        if($size < 1044070){
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['LokasiFile']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
            mysqli_query ($Koneksi, "update foto set JudulFoto='$JudulFoto',DeskripsiFoto='$DeskripsiFoto',LokasiFile='$xx',AlbumID='$AlbumID'");
            header("location:Foto.php");
        }else{
            header("location:Foto.php");
        }
    }
}else{
    mysqli_query($Koneksi,"update foto set JudulFoto='$JudulFoto',DeskripsiFoto='$DeskripsiFoto',LokasiFile='$LokasiFile'");
    header("location:Foto.php");
}
?>