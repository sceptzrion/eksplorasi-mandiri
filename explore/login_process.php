<?php
    // memulai interaksi (sessions)
    session_start();
 
    include_once("./connect.php");
 
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($db, $sql);
 
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // cek kesesuaian password
            if(password_verify($password, $row['password'])) {
                $_SESSION['email'] = $email;
                // pindahin lokasi ke index.php
                header("Location: index.php");
                exit;
            } else {
                echo "Password salah.";
            }
        } else {
            echo "Email tidak ditemukan.";
        }
    }
 