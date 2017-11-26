<?php
$id_uni = $_POST['Id_uni'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$con = new mysqli($servername, $username, $password, $dbname);

$result = $con->query("SELECT * FROM post WHERE University_Id =$id_uni");
if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        $id_post = $row['Id'];
        $sql = "DELETE FROM likes WHERE Post_Id=$id_post";
        $con->query($sql);
    }
}

$sql = "DELETE FROM post WHERE University_Id=$id_uni";
$con->query($sql);

$sql = "DELETE FROM department WHERE University_Id=$id_uni";
$con->query($sql);

$sql = "DELETE FROM college WHERE University_Id=$id_uni";
$con->query($sql);

$sql = "DELETE FROM university WHERE Id=$id_uni";
$con->query($sql);
?>

