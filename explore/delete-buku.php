<?php
    include_once("./connect.php");

    $id = $_GET["id"];

    mysqli_query($db, "DELETE FROM buku WHERE id=$id");

    header("Location: ./buku.php");
?>