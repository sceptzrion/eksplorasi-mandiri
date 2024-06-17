<?php
    include_once("./connect.php");

    if (isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $telp = $_POST["telp"];
        $email = $_POST["email"];

        $query = mysqli_query($db, "INSERT INTO staff VALUES(
            NULL, '$nama', '$telp', '$email'
        )");

        echo
            "<script>
                alert('Staff berhasil ditambahkan')
            </script>";

        header("Location: ./staff.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Staff</title>
</head>
<body>
    <h1>Form Tambah Staff</h1>

    <form method="POST">
        <label for="nama">Nama</label>
        <input type="text" name="nama">
        <br>
        <br>
        <label for="telp">Telepon</label>
        <input type="text" name="telp">
        <br>
        <br>
        <label for="email">Email</label>
        <input type="text" name="email">
        <br>
        <br>
        <button style="margin-left: 4rem;" type="submit" name="submit">Tambah</button>
    </form>

    <br>
    <a href="./staff.php">Kembali</a>
    <br>
    <a href="./index.php">Kembali ke halaman utama</a>
</body>
</html>