<?php


$Id = $_POST['Id'];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$con = new mysqli($servername, $username, $password, $dbname);

$sql = "DELETE FROM followers WHERE Id=$Id";
$con->query($sql);

?>