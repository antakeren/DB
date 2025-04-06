<?php
include 'connetion.php';

$result = mysqli_query($conn, "SELECT * FROM data") or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data List</title>
</head>
<body style="background-color: white; color: #003366; font-family: Arial;">
    <h2 style="text-align: center;">Daftar Data</h2>

    <div style="width: 80%; margin: auto;">
        <a href="create.php" style="display: inline-block; margin-bottom: 10px; padding: 8px 12px; background-color: #003366; color: white; text-decoration: none;">Tambah Data</a>

        <table border="1" width="100%" cellpadding="8" cellspacing="0" style="border-collapse: collapse;">
            <tr style="background-color: #003366; color: white;">
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $no = 1;
            while($row = mysqli_fetch_array($result)) {
            ?>
            <tr style="background-color: #f2f2f2;">
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['nama']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" style="color: #003366;">Edit</a> |
                    <a href="delete.php?id=<?php echo $row['id']; ?>" style="color: red;" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
