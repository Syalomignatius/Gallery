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
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>
    <p>Welcome <b><?=$_SESSION['NamaLengkap']?></b></p>

    <ul>
        <li><a href="album.php">Album<a></li>
        <li><a href="Logout.php">Logout</a></li>
        <li><a href="Foto.php">Foto</a></li>
    </ul>
    
</body>
</html>