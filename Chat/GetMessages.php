<?php

$con = new mysqli('localhost', 'root','' , 'Chat');

$query = "SELECT * FROM Messages";
$run = $con->query($query);

while($fetch = $run->fetch_array()) {

    $name = $fetch['name'];
    $message = $fetch['message'];

    echo "<li class='cm'><b>".ucwords($name)."</b> - ".$message."</li>";


}
?>