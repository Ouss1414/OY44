<?php
$Id = $_POST['delete_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$con = new mysqli($servername, $username, $password, $dbname);
$sql = "DELETE FROM exercise WHERE Id=$Id";
$con->query($sql);
?>

