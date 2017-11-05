<?php

$Like_v = '';
$Dislike_v = '';
$Id_Post= '';
$User_Id = '';
$Like = '';
$Dislike = '';
$Type_Like = '';

$Like_v = $_POST['Like'];
$Dislike_v = $_POST['Dislike'];
$Id_Post = $_POST['Id_Post'];
$User_Id = $_POST['Id_User'];


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
            $Dislike = --$row_Post['Dislike'];
            if ($Dislike < 0){
                $Dislike = 0 ;
            }
            $Type_Like = 'Like';
        }else{
            $Dislike = ++$row_Post['Dislike'];
            $Like = --$row_Post['Like_Post'];
            if ($Like < 0){
                $Like = 0 ;
            }
            $Type_Like = 'Dislike';
        }
    }
}
$sql = "UPDATE post set Like_Post= '$Like', Dislike= '$Dislike' WHERE Id='$Id_Post'";
mysqli_query($con, $sql);

$sql_like = "UPDATE likes set Type_Like='$Type_Like' WHERE Post_Id='$Id_Post' AND User_Id= '$User_Id'";
mysqli_query($con, $sql_like);

?>