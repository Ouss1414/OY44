<?php
if (isset($_SESSION['user'])){
    Questions_Page();
}else{
    header("Location: http://localhost/OY44/index.php?pid=Login&Serial=$_GET[Serial]");
}
?>