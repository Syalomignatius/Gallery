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
    <h1>halaman Foto</h1>
    <p>Welcome <b><?=$_SESSION['NamaLengkap']?></b></p>

    <ul>
        <li><a href="album.php">Album<a></li>
        <li><a href="Foto.php">Foto</a></li>
        <li><a href="Logout.php">Logout</a></li>

    </ul>
    <form action="ADD_Foto.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Judul</td>
            <td><input type="text" name="JudulFoto"> </td>
        </tr>
        <tr>
            <td>DeskripsiFoto</td>
            <td><input type="text" name="DeskripsiFoto"></td>
        </tr>
        <tr>
            <td>Lokasi File</td>
            <td><input type="file" name="LokasiFile"></td>
        </tr>
        <tr>
            <td>Album</td>
            <td>
                <select name="AlbumID">
                    <?php
                    include "Koneksi.php";
                    $UserID=$_SESSION['UserID'];
                    $sql=mysqli_query($Koneksi,"select * from album where UserID='$UserID'");
                    while($data=mysqli_fetch_array($sql)){
                    ?>
                        <option value="<?=$data['AlbumID']?>"><?=$data['NamaAlbum']?> </option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Add"></td>
        </tr> 
    </table>
</form>

<table border="1" cellpadding=5 cellspacing=0>
<tr>
    <th>ID</th>
    <th>Judul</th>
    <th>Deskripsi</th>
    <th>Tanggal Unggah</th>
    <th>Lokasi File</th>
    <th>Album</th>
    <th>Disukai</th>
    <th>Aksi</th>
</tr>
    <?php
    include "Koneksi.php";
    $UserID=$_SESSION['UserID'];
    $sql=mysqli_query($Koneksi,"select * from foto,album where foto.UserID='$UserID' and foto.AlbumID=album.AlbumID");
    while($data=mysqli_fetch_array($sql)){
    ?>
     <tr>
    <td><?=$data['FotoID']?></td>
    <td><?=$data['JudulFoto']?></td>
    <td><?=$data['DeskripsiFoto']?></td>
    <td><?=$data['TanggalUnggah']?></td>
    <td>
        <img src="gambar/<?=$data['LokasiFile']?>" width="200px" alt="Photo">
    </td>
    <td><?=$data['NamaAlbum']?></td>
    <?php
    $FotoID=$data['FotoID'];
    $sql12=mysqli_query($Koneksi,"select * from LikeFoto where FotoID='$FotoID'");
    echo mysqli_num_rows($sql);
    ?>
    <td>
    <a href="Edit_foto.php?FotoID=<?=$data['FotoID']?>">Edit</a>
    <a href="Delete_foto.php?FotoID=<?=$data['FotoID']?>">Delete</a>
    </td>
    <tr>
    </tr>
    </td>
    </tr>
    <?php
    }
    ?>
</table>
    
</body>
</html>