<?php

$con = new mysqli('localhost', 'root','' , 'IEBOOK');

function Close_DB(){
    global $con;
    mysqli_close($con);
};

?>