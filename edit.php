<?php
include 'connetion.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM data WHERE id=$id") or die(mysqli_error($conn));
$data = mysqli_fetch_array($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE data SET nama='$nama', email='$email', alamat='$alamat' WHERE id=$id";
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    header("Location: main.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Data</title>
</head>
<body style="background-color: white; color: #003366; font-family: Arial;">
    <h2 style="text-align: center;">Edit Data</h2>

    <div style="width: 60%; margin: auto;">
        <form method="POST" action="">
            <label>Nama:</label><br>
            <input type="text" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>

            <label>Email:</label><br>
            <input type="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>

            <label>Alamat:</label><br>
            <textarea name="alamat" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><?php echo htmlspecialchars($data['alamat']); ?></textarea><br>

            <input type="submit" value="Update" style="padding: 8px 16px; background-color: #003366; color: white; border: none; cursor: pointer;">
            <a href="index.php" style="margin-left: 10px; text-decoration: none; color: #003366;">Kembali</a>
        </form>
    </div>
</body>
</html>
