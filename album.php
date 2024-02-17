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
    <h1>halaman Album</h1>
    <p>Welcome <b><?=$_SESSION['NamaLengkap']?></b></p>

    <ul>
        <li><a href="album.php">Album<a></li>
        <li><a href="Logout.php">Logout</a></li>
        <li><a href="Foto.php">Foto</a></li>
    </ul>
    <form action="ADD_album.php" method="post">
    <table>
    <tr>
    <td>Nama Album</td>
    <td><input type="text" name="NamaAlbum"> </td>
    <tr>
    
    <tr>
    <td>Deskripsi</td>
    <td><input type="text" name="Deskripsi"></td>
    <tr>

    <tr>
    <td></td>
    <td><input type="submit" value="Add"></td>
    <tr> 
    </table>
</form>
<table border="1" cellpadding=5 cellspacing=0>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Deskripsi</th>
    <th>TanggalDibuat</th>
    <th>Aksi</th>
</tr>
    <?php
    include "Koneksi.php";
    $UserID=$_SESSION['UserID'];
    $sql=mysqli_query($Koneksi,"select * from album where UserID='$UserID'");
    while($data=mysqli_fetch_array($sql)){
    ?>
     <tr>
    <td><?=$data['AlbumID']?></td>
    <td><?=$data['NamaAlbum']?></td>
    <td><?=$data['Deskripsi']?></td>
    <td><?=$data['TanggalDibuat']?></td>
    <td>
    <a href="Delete_album.php?AlbumID=<?=$data['AlbumID']?>">Delete</a>
    <a href="Edit_album.php?AlbumID=<?=$data['AlbumID']?>">Edit</a>
    </td>
    </tr>
    <?php
    }
    ?>
</table>
    
</body>
</html>