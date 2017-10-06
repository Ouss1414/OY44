<?php
$postId = $_GET['PostID'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iebook";

$con = new mysqli($servername, $username, $password, $dbname);
$sql = "DELETE FROM post WHERE Id=$postId";
$con->query($sql);
?>

<div class="w3-center w3-xxxlarge" style="margin-top: 20%;margin-bottom: 20%;">
    The Post <i class="w3-text-red"><?= $_GET['Subject'] ?></i> is Deleted
</div>

<meta http-equiv="refresh" content="2; '/OY44/index.php?pid=Department&uni=<?=$_GET['uni']?>&college=<?=$_GET['college']?>&dep=<?=$_GET['dep']?>'"/>


