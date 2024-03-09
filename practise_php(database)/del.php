<?php include "./db.php";

    $id = $p['id'];
    $sql = $pdo -> prepare("DELETE FROM `db01` WHERE id = $id");
    $sql -> execute();
    header("location: ./index.html");