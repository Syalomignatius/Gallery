<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <h1>Register</h1>
    <form action="Proses_register.php" method="post">
            <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="Username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="Password" name="Password"></td>
            </tr> 
            <tr>
                <td>Email</td>
                <td><input type="Email" name="Email"></td>
            </tr>
            <tr>
                <td>Nama lengkap</td>
                <td><input type="text" name="NamaLengkap"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="Alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="Submit" value="Register"></td>
            </tr>  
            <td><a href="Login.php">Login</a></td>      
            </table>
    </form>  
</body>
</html>


