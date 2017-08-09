<?php

$con = new mysqli('localhost', 'root','' , 'iebook');

function Close_DB(){
    global $con;
    mysqli_close($con);
};

?>