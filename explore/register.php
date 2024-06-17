<?php
    session_start();
    if (isset($_SESSION['email'])) {
        header("Location: index.php");
        exit;
    }

    //validasi form
    
    //inisialisasi
    $email = $password = $email_err = $password_err = $email_check = $password_check = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(empty(trim($_POST['email']))) {
            $email_err = "Email harus diisi.";
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = $_POST['email'];
            $email_err = "Email tidak valid";
        } else {
            $email = $_POST['email'];
            $email_check = "VALID";
        }

        if(empty(trim($_POST['password']))) {
            $password_err = "Password tidak boleh kosong.";
        } else {
            $password = $_POST['password'];
            $password_check = "VALID";
        }

        if($email_check == "VALID" && $password_check == "VALID") {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header("Location: register_process.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun</title>
</head>
<body>
    <h2>Register</h2>
    <form method="POST" action="./register.php">
        <label for="Email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>">
        <span><?php echo $email_err; ?></span>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <span><?php echo $password_err; ?></span>
        <br><br>
        <input type="submit" value="Register">
    </form>
    <br>
    <a>Sudah punya akun?</a>
    <a href="./login.php">Login</a>
</body>
</html>