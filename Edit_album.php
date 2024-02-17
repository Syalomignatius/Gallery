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
    <title>Album</title>
</head>
<body>
    <h1>Edit Album</h1>
    <p>Welcome <b><?=$_SESSION['NamaLengkap']?></b></p>
  
    <ul>
        <li><a href="album.php">Album<a></li>
        <li><a href="Logout.php">Logout</a></li>
    </ul>
    <form action="Update_album.php" method="post">
    <?php
    include "Koneksi.php";
    $AlbumID=$_GET['AlbumID'];
    $sql=mysqli_query($Koneksi,"select * from album where AlbumID='$AlbumID'");
    while($data=mysqli_fetch_array($sql)){
   
    ?>
    <input type="text" name="AlbumID" value="<?=$data['AlbumID']?>" hidden>
    <table>
    <tr>
    <td>Nama Album</td>
    <td><input type="text" name="NamaAlbum" value="<?=$data['NamaAlbum']?>"> </td>
    <tr>
    <tr>
    <td>Deskripsi</td>
    <td><input type="text" name="Deskripsi"value="<?=$data['Deskripsi']?>"></td>
    <tr>
    <tr>
    <td></td>
    <td><input type="submit" value="Edit"></td>
    <tr> 
    </table>
    <?php
    }
    ?>
</form>
     
</body>
</html>