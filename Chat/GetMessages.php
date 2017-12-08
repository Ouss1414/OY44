<?php




$sb =strip_tags(strip_tags($_GET['Sbook']));

$con = new mysqli('localhost', 'root','' , 'chat');

$query = "SELECT * FROM Messages WHERE Sbook = '$sb'";
$run = $con->query($query);

while($fetch = $run->fetch_array()) {

    $name = $fetch['name'];
    $message = $fetch['message'];

    echo "<li class='cm'><b>".ucwords($name)."</b> - ".$message."</li>";


}
?>