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
<div class="tab-pane active" id="tab1" align="center">
    <table class="table" style="max-width: 70%">
        <tr style="background: cadetblue;">
            <td style="font-size: 15px; color: white">Colleges</td>
            <td style="font-size: 15px; color: white; width: 50px">Delete</td>
        </tr>
        <tr>
            <td>
                
            </td>
            <td align="center">
                <a style="cursor: pointer; font-size: 20px; color: #ff3030;"><i class="entypo-trash"></i></a>
            </td>
        </tr>
        
    </table>
</div>
</div>

<hr />
    ';
}else{
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px; padding-bottom: 17%" " align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}


?>