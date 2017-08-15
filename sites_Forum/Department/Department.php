<?php
if (isset($_SESSION['user'])) {
    $Name_University = $_GET['uni'];
    $Name_College = $_GET['college'];
    $Name_Department = $_GET['dep'];

    DepartmentOperations($Name_University,$Name_College,$Name_Department);
}else{
    echo '<meta http-equiv="refresh" content="0; \'index.php?pid=Login\'"/>';}