<?php
$id = $_POST['delete_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iebook";

$con = new mysqli($servername, $username, $password, $dbname);
$sql = "DELETE FROM post WHERE Id=$id";
$con->query($sql);
?>

