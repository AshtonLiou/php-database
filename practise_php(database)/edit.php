<?php include "./db.php";

    $id = $p['editId'];
    $sql = $pdo -> prepare("UPDATE `db01` SET `fname`='{$p['efname']}',`lname`='{$p['elname']}',`phone`='{$p['ephone']}',`pw`='{$p['epw']}' WHERE `id` =  $id");
    $sql -> execute();
    header("location: ./index.html");