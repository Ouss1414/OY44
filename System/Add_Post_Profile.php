<?php
$post = $_POST['delete_id'];
$date = date("Y/m/d");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iebook";

$con = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO post_profile (Post, Date)
                  VALUES ('$post', '$date')";

if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

?>