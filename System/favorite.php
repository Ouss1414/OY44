<?php

$Id_User = $_POST['Id_User'];
$Id_Book = $_POST['Id_Book'];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$con = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO favorite_book (User_Id, Book_Id) VALUES ('$Id_User','$Id_Book')";
mysqli_query($con,$sql);

?>