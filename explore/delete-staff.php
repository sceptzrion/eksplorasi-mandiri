<?php
    include_once("./connect.php");

    $id = $_GET["id"];

    mysqli_query($db, "DELETE FROM staff WHERE id=$id");

    header("Location: ./staff.php");
?>