<?php

$Id_User = $_POST['Id_User'];
$Id_Book = $_POST['Id_Book'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$con = new mysqli($servername, $username, $password, $dbname);

$sql = "DELETE FROM favorite_book WHERE User_Id=$Id_User AND Book_Id=$Id_Book";
$con->query($sql);

?>