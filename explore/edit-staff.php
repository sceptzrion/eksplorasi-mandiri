<?php
    include_once("./connect.php");

    $id = $_GET["id"];
    $get_staff = mysqli_query($db, "SELECT * FROM staff WHERE id=$id");
    $staff = mysqli_fetch_assoc($get_staff);

    if (isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $telp = $_POST["telp"];
        $email = $_POST["email"];

        $query = mysqli_query($db, "UPDATE staff SET nama='$nama', telp='$telp', email='$email' WHERE id='$id'");

        echo
            "<script>
                alert('Staff berhasil diperbarui')
            </script>";

        header("Location: ./staff.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update Staff</title>
</head>
<body>
    <h1>Form Update Staff</h1>

    <form method="POST">
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?php echo $staff['nama'] ?>">
        <br>
        <br>
        <label for="telp">Telepon</label>
        <input type="text" name="telp" value="<?php echo $staff['telp'] ?>">
        <br>
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo $staff['email'] ?>">
        <br>
        <br>
        <button style="margin-left: 4rem;" type="submit" name="submit">Edit</button>
    </form>

    <br>
    <a href="./staff.php">Kembali</a>
</body>
</html>