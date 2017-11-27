<?php
$dep_del = $_POST['dep_del'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$con = new mysqli($servername, $username, $password, $dbname);


$sql = "DELETE FROM department WHERE Id=$dep_del";
$con->query($sql);

?>