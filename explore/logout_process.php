<?php
    //memulai interaksi session
    session_start();

    //menghancurkan session email
    session_destroy();

    //unset session email
    session_unset();

    header("Location: login.php");
?>