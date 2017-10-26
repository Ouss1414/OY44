<?php

$con = new mysqli('localhost', 'root','' , 'db_iebook_8003115736_v');

function Close_DB(){
    global $con;
    mysqli_close($con);
};

?>