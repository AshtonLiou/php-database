<?php include "./db.php";

    $sql = "INSERT INTO `db01`(`id`, `fname`, `lname`, `phone`, `pw`) VALUES (NULL,'{$p['fname']}','{$p['lname']}','{$p['phone']}','{$p['pw']}')";
    $pdo -> exec($sql);
    header("location: ./index.html");