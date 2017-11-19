<?php

$user_name = $_SESSION['user'];
$Type='';

//user
$sql = "SELECT * FROM user WHERE User_Name='$user_name'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $Type = $row['User_Type'];
    }
}
if ($Type == 'author'){

    echo '
<ol class="breadcrumb 2" >
    <li>
        <a href="ControlPanel.php?CP=home"><i class="fa-home"></i>Home</a>
    </li>
    <li>
        <a href="ControlPanel.php?CP=Exercise"><i class="fa-home"></i>Exercise</a>
    </li>
    <li class="active">
        <strong>Edit Exercise</strong>
    </li>
</ol>

<div class="row" align="center">
    <h2 class="margin-bottom">Edit Exercise</h2>
    ';
        Edit_Exercise();
    echo '
    <div align="center">
        <input type="submit" value="Update" name="'. $_GET['Serial'] .'" class="Update_Exercise btn btn-green" id=""/>
        <input type="reset" value="Reset" name="reset_book" class="btn btn-red margin-left"/>
    </div>
</div>

<hr />
';
}else{
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px;  padding-bottom: 17%" align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}

?>