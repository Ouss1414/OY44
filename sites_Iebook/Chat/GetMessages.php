<?php




$sb =strip_tags(strip_tags($_GET['Sbook']));

$con = new mysqli('localhost', 'root','' , 'db_iebook_8003115736_v');

$query = "SELECT * FROM chat_book WHERE Serial_Book = '$sb'";
$run = $con->query($query);

while($fetch = $run->fetch_array()) {

    $name = $fetch['User_Name'];
    $message = $fetch['Message'];

    echo "<li class='cm'><b>".ucwords($name)."</b> - ".$message."</li>";


}
?>