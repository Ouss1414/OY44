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
if ($Type == 'admin'){

    echo '
<ol class="breadcrumb 2" >
    <li>
        <a href="ControlPanel.php?CP=home"><i class="fa-home"></i>Home</a>
    </li>
    <li class="active">
        <strong>Colleges of University</strong>
    </li>
</ol>

<div class="row">
    <table>
        <tr>
            <td>College</td>
            <td>Delete</td>
        </tr>
        <tr>
            <td>dep1</td>
            <td>Delete</td>
        </tr>
        <tr>
            <td>dep2</td>
            <td>Delete</td>
        </tr>
    </table>
</div>

<hr />
    ';
}else{
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px; padding-bottom: 17%" " align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}


?>