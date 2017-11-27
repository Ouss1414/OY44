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
        <a href="ControlPanel.php?CP=home">Home</a>
    </li>
    <li>
        <a href="ControlPanel.php?CP=Control_University">Control University</a>
    </li>
    <li>
        <a href="ControlPanel.php?CP=Show_College&uni='.$_GET['uni'].'">Colleges of University</a>
    </li>
    <li class="active">
        <strong>Departments of College</strong>
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

    $college_id = '';
    $college_name = '';
    $result_college = $con->query("SELECT * FROM college");
    if ($result_college->num_rows > 0) {
        while ($row_college = $result_college->fetch_assoc()) {
            if($row_college['Name'] == $_GET['college']){
                $college_id = $row_college['Id'];
                $college_name = $row_college['Name'];
            }
        }
    }
    if ($_GET['uni'] == $uni_name && !empty($_GET['uni']) && $_GET['college'] == $college_name && !empty($_GET['college'])) {

        $result_dep = $con->query("SELECT * FROM department WHERE College_Id=$college_id AND University_Id=$uni_id");
        if ($result_dep->num_rows > 0) {
            echo '
                <table class="table" style="max-width: 70%">
                    <tr style="background: cadetblue;">
                        <td style="font-size: 15px; color: white">Department of '.$_GET['college'].' college</td>
                        <td style="font-size: 15px; color: white; width: 50px">Edit</td>
                        <td style="font-size: 15px; color: white; width: 50px">Delete</td>
                    </tr>
            ';
            while ($row_dep = $result_dep->fetch_assoc()) {
                echo '
                
                    <tr>
                        <td style="color: cadetblue; padding-left: 20px">
                            <a>' . $row_dep['Name'] . '</a>
                        </td>
                        <td align="center">
                            <a style="cursor: pointer; font-size: 20px;" href="ControlPanel.php?CP=Update_College&uni='.$_GET['uni'].'&college='.$_GET['college'].'&dep='.$row_dep['Name'].'"><i class="entypo-pencil"></i></a>
                        </td>
                        <td align="center">
                            <a style="cursor: pointer; font-size: 20px; color: #ff3030;" class="Name_dep" name="'.$row_dep['Name'].'" id="'.$row_dep['Id'].'"><i class="entypo-trash"></i></a>
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