<?php

$Like_v = $_POST['Like'];
$Dislike_v = $_POST['Dislike'];
$Like = '';
$Dislike = '';
$Id_Post = $_POST['Id_Post'];
$User_Id = $_POST['Id_User'];
$Type_Like = '';


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$con = new mysqli($servername, $username, $password, $dbname);

//Post
$sql_Post = "SELECT * FROM post WHERE Id='$Id_Post'";
$result_Post = $con->query($sql_Post);
if ($result_Post->num_rows > 0){
    while ($row_Post = $result_Post->fetch_assoc()){
        if ($Like_v == 'Like') {
            $Like = ++$row_Post['Like_Post'];
            $Type_Like = 'Like';
        }
        if ($Dislike_v == 'Dislike'){
            $Dislike = ++$row_Post['Dislike'];
            $Type_Like = 'Dislike';
        }
    }
}
if ($Like_v == 'Like') {
    $sql = "UPDATE post set Like_Post= '$Like' WHERE Id='$Id_Post'";
}
if ($Dislike_v == 'Dislike'){
    $sql = "UPDATE post set Dislike= '$Dislike' WHERE Id='$Id_Post'";
}
mysqli_query($con, $sql);

$sql_like = "INSERT INTO likes (Type_Like, User_Id, Post_Id) VALUES ('$Type_Like', '$User_Id', '$Id_Post')";
mysqli_query($con, $sql_like);

?>