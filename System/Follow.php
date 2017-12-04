<?php


$Id = $_POST['Id'];
$Id_follow = $_POST['Id_follow'];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$con = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO followers (User_Id, Following) VALUE ('$Id', '$Id_follow')";
$con->query($sql);

?>