<?php
    include_once("./connect.php");

    $query = mysqli_query($db, 'SELECT * FROM staff');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Staff</title>
</head>
<body>
    <h1>Daftar Staff</h1>

    <table border="1" cellpadding="3" style="text-align: center">
        <tr>
            <td>ID</td>
            <td>Nama</td>
            <td>Telp</td>
            <td>Email</td>
            <td colspan="2">Aksi</td>
        </tr>
        <?php foreach ($query as $staff): ?>
        <tr>
            <td><?php echo $staff['id'] ?></td>
            <td><?php echo $staff['nama'] ?></td>
            <td><?php echo $staff['telp'] ?></td>
            <td><?php echo $staff['email'] ?></td>
            <td>
                <a href=<?php echo "./edit-staff.php?id=" . $staff['id']  ?>>EDIT</a>
            </td>
            <td>
                <a href=<?php echo "./delete-staff.php?id=" . $staff['id']  ?>>HAPUS</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>

    <br>
    <a href="./create-staff.php">Tambah staff</a>
    <br>
    <a href="./index.php">Kembali ke halaman utama</a>
</body>
</html>