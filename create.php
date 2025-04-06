<?php
include 'connetion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO data (nama, email, alamat) VALUES ('$nama', '$email', '$alamat')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    header("Location: main.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
</head>
<body style="background-color: white; color: #003366; font-family: Arial;">
    <h2 style="text-align: center;">Tambah Data</h2>

    <div style="width: 60%; margin: auto;">
        <form method="POST" action="">
            <label>Nama:</label><br>
            <input type="text" name="nama" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>

            <label>Email:</label><br>
            <input type="email" name="email" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>

            <label>Alamat:</label><br>
            <textarea name="alamat" required style="width: 100%; padding: 8px; margin-bottom: 10px;"></textarea><br>

            <input type="submit" value="Simpan" style="padding: 8px 16px; background-color: #003366; color: white; border: none; cursor: pointer;">
            <a href="index.php" style="margin-left: 10px; text-decoration: none; color: #003366;">Kembali</a>
        </form>
    </div>
</body>
</html>
