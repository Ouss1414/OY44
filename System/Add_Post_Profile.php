<?php

$post = $_POST['delete_id'];
$User_Id = $_POST['User_Id'];
$date = date("Y/m/d");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iebook";

$con = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO post_profile (Post, Date, User_Id)
                  VALUES ('$post', '$date', '$User_Id')";

if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

?>