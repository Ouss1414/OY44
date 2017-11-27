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
    <li>
        <a href="ControlPanel.php?CP=Control_University"><i class="fa-home"></i>Control University</a>
    </li>
    <li class="active">
        <strong>Colleges of University</strong>
    </li>
</ol>

<div class="row" align="center">
';
    $uni_id = '';
    $uni_name = '';
    $result_uni = $con->query("SELECT * FROM university");
    if ($result_uni->num_rows > 0) {
        while ($row_uni = $result_uni->fetch_assoc()) {
            if($row_uni['Name'] == $_GET['uni']){
                $uni_id = $row_uni['Id'];
                $uni_name = $row_uni['Name'];
            }
        }
    }
    if ($_GET['uni'] == $uni_name && !empty($_GET['uni'])) {

        $result_college = $con->query("SELECT * FROM college WHERE University_Id=$uni_id");
        if ($result_college->num_rows > 0) {
            echo '
                <table class="table" style="max-width: 70%">
                    <tr style="background: cadetblue;">
                        <td style="font-size: 15px; color: white">Colleges of '.$_GET['uni'].'</td>
                        <td style="font-size: 15px; color: white; width: 50px">Edit</td>
                        <td style="font-size: 15px; color: white; width: 50px">Delete</td>
                    </tr>
            ';
            while ($row_college = $result_college->fetch_assoc()) {
                echo '
                
                    <tr>
                        <td style="color: cadetblue; padding-left: 20px">
                            <a href="ControlPanel.php?CP=Show_dep&uni='.$_GET['uni'].'&college='.$row_college['Name'].'">'. $row_college['Name'] .'</a>
                            <i style="float: right; color: lightgrey">Click on college to show department of this college!</i>
                        </td>
                        <td align="center">
                            <a style="cursor: pointer; font-size: 20px;" href="ControlPanel.php?CP=Update_College&uni='.$_GET['uni'].'&college='.$row_college['Name'].'"><i class="entypo-pencil"></i></a>
                        </td>
                        <td align="center">
                            <a style="cursor: pointer; font-size: 20px; color: #ff3030;" class="Name_college" name="'.$row_college['Name'].'" id="'.$row_college['Id'].'"><i class="entypo-trash"></i></a>
                        </td>
                    </tr>
                ';
            }
        }
    } else {
        echo '<script>location.href="ControlPanel.php?CP=Control_University"</script>';
    }
        echo '
</table>
</div>

<hr />
    ';

}else{
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px; padding-bottom: 17%" " align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}


?>