<?php
session_start();
if(!isset($_SESSION['UserID'])){
    header("location:Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto</title>
</head>
<body>
    <h1>Edit Foto</h1>
    <p>Welcome <b><?=$_SESSION['NamaLengkap']?></b></p>
  
    <ul>
        <li><a href="album.php">Album<a></li>
        <li><a href="Logout.php">Logout</a></li>
        <li><a href="Foto.php"></a>Foto</li>
    </ul>
    <form action="Update_Foto.php" method="post" enctype="multipart/form-data">
    <?php
    include "Koneksi.php";
    $FotoID=$_GET['FotoID'];
    $sql=mysqli_query($Koneksi,"select * from Foto where FotoID='$FotoID'");
    while($data=mysqli_fetch_array($sql)){
   
    ?>
    <input type="text" name="FotoID" value="<?=$data['FotoID']?>" hidden>
    <table>
    <tr>
    <td>Judul</td>
    <td><input type="text" name="Judul" value="<?=$data['JudulFoto']?>"> </td>
    </tr>
    <tr>
    <td>Deskripsi Foto</td>
    <td><input type="text" name="Deskripsi"value="<?=$data['DeskripsiFoto']?>"></td>
    </tr>
    <tr>
    <td>Lokasi File</td>
    <td><input type="file" name="LokasiFile" ></td>
    </tr>
    <tr>
    <td>Album</td>
            <td>
                <select name="AlbumID">
                    <?php
                    include "Koneksi.php";
                    $UserID=$_SESSION['UserID'];
                    $sql2=mysqli_query($Koneksi,"select * from album where UserID='$UserID'");
                    while($data=mysqli_fetch_array($sql2)){
                    ?>
                        <option value="<?=$data['AlbumID']?>" <?php if($data['AlbumID']==$data['AlbumID']){echo 'selected';}?>><?=$data['NamaAlbum']?> </option>
                    <?php
                    }
                    ?>
    </tr>
    <tr>
    <td></td>
    <td><input type="submit" value="Edit"></td>
    </tr> 
    </table>
    <?php
    }
    ?>
</form>
     
</body>
</html>