<?php
$college_del = $_POST['college_del'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$con = new mysqli($servername, $username, $password, $dbname);


$sql = "DELETE FROM department WHERE College_Id=$college_del";
$con->query($sql);

$sql = "DELETE FROM college WHERE Id=$college_del";
$con->query($sql);
?>