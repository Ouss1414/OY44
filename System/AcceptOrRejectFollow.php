<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$con = new mysqli($servername, $username, $password, $dbname);

    $Id = $_POST['Id'];
    $status = $_POST['status'];


    $sql = "UPDATE followers set Status='$status' WHERE Id=$Id";
    $con->query($sql);

?>