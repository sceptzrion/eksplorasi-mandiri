<?php
    session_start();

    include_once("./connect.php");

    if(isset($_SESSION['email']) && isset($_SESSION['password'])){
        $email = $_SESSION['email'];

        $password = password_hash($_SESSION['password'],PASSWORD_DEFAULT);

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($db, $sql);

        if(mysqli_num_rows($result)>0){
            echo "Email sudah terdaftar";
        }else{
            $sql = "INSERT INTO users (email, password) VALUES ('$email','$password')";

            if(mysqli_query($db, $sql) === TRUE){
                echo "Registrasi berhasil. Silahkan <a href='login.php'>Login</a>";
            }else{
                echo"registrasi gagal";
            }
        }

        // Hapus data session setelah digunakan
        unset($_SESSION['email']);
        unset($_SESSION['password']);
    }
?>