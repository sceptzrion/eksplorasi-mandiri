<?php
    include_once("./connect.php");

    $id = $_GET["id"];
    $get_buku = mysqli_query($db, "SELECT * FROM buku WHERE id=$id");
    $buku = mysqli_fetch_assoc($get_buku);

    if (isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $isbn = $_POST["isbn"];
        $unit = $_POST["unit"];

        $query = mysqli_query($db, "UPDATE buku SET nama='$nama', isbn='$isbn', unit='$unit' WHERE id='$id'");

        echo
            "<script>
                alert('Buku berhasil diperbarui')
            </script>";

        header("Location: ./buku.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit buku</h1>

    <form method="POST">
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?php echo $buku['nama'] ?>">
        <br>
        <br>
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" value="<?php echo $buku['isbn'] ?>">
        <br>
        <br>
        <label for="unit">Unit</label>
        <input type="number" name="unit" value="<?php echo $buku['unit'] ?>">
        <br>
        <br>
        <button style="margin-left: 4rem;" type="submit" name="submit">Edit</button>
    </form>
    
    <br>
    <a href="./buku.php">Kembali</a>
</body>
</html>