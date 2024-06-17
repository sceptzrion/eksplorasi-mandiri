<?php
    include_once("./connect.php");

    if (isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $isbn = $_POST["isbn"];
        $unit = $_POST["unit"];

        $query = mysqli_query($db, "INSERT INTO buku VALUES(
            NULL, '$nama', '$isbn', '$unit'
        )");

        echo
            "<script>
                alert('Buku berhasil ditambahkan')
            </script>";

        header("Location: ./buku.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah buku</h1>

    <form method="POST">
        <label for="nama">Nama</label>
        <input type="text" name="nama">
        <br>
        <br>
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn">
        <br>
        <br>
        <label for="unit">Unit</label>
        <input type="number" name="unit">
        <br>
        <br>
        <button style="margin-left: 4rem;" type="submit" name="submit">Tambah</button>
    </form>

    <br>
    <a href="./buku.php">Kembali</a>
    <br>
    <a href="./index.php">Kembali ke halaman utama</a>
</body>
</html>