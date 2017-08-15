<?php
if (isset($_SESSION['user'])) {

    $Name_University = $_GET['uni'];
    $Name_College = $_GET['college'];
    $Name_Department = $_GET['dep'];
    $Name_Subject = $_GET['sub'];

    PostOperations($Name_University,$Name_College,$Name_Department,$Name_Subject);

}else{
    echo '<meta http-equiv="refresh" content="0; \'index.php?pid=Login\'"/>';
}
?>