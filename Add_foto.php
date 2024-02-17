<?php
include "Koneksi.php";
session_start();

$JudulFoto=$_POST['JudulFoto'];
$DeskripsiFoto=$_POST['DeskripsiFoto'];
$AlbumID=$_POST['AlbumID'];
$TanggalUnggah=date("Y-m-d");
$UserID=$_SESSION['UserID'];

$rand = rand();
$extention = array('png','jpg','JPG','jpeg','gif');
$filename = $_FILES['LokasiFile']['name'];
$size = $_FILES['LokasiFile']['Size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$extention) ){
    header("location:Foto.php");
}else{
    if($size < 1044070){
        $xx = $rand.'_'.$filename;
        move_uploaded_file($_FILES['LokasiFile']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
        mysqli_query($Koneksi,"INSERT INTO foto VALUES(NULL,'$JudulFoto','$DeskripsiFoto','$TanggalUnggah','$xx','$AlbumID','$UserID')");
    header("location:Foto.php");
    
if (!$sql) {
    die("Error: " . mysqli_error($Koneksi));
}
    }else{
        header("location:Foto.php");
    }
}

?>