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
if ($Type == 'admin') {

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
    ';
    if(!empty($_GET['dep'])){
        echo '
            <li>
                <a href="ControlPanel.php?CP=Show_dep&uni='.$_GET['uni'].'&college='.$_GET['college'].'">Departments of College</a>
            </li>
        ';
    }
    echo '
    <li class="active">
        <strong>Update College and Departments</strong>
    </li>
</ol>

<div class="row">
    <h2 class="margin-bottom" align="center">Update College and Departments</h2>	

		<form action="System/Update_College.php" method="post" enctype="multipart/form-data">
			    <table class="table" style="max-width: 70%">
			    
			    <tr>
                            <td><label for="Name_uni"><span style="color: red">*</span> Choose University: </label></td>
                            <td>
                                <select name="Name_uni" class="form-control" id="Name_uni" onchange="location.href=\'ControlPanel.php?CP=Update_College&uni=\'+this.value">
                                <option value="ChooseUniversity">Choose University</option>
                                ';
    $uni_Id = '';
    $uni_name = '';
    $result_uni = $con->query("SELECT * FROM university");
    if ($result_uni->num_rows > 0) {
        while ($row_uni = $result_uni->fetch_assoc()) {
            if ($_GET['uni'] == $row_uni['Name']) {
                echo '
              <option selected value="' . $row_uni['Name'] . '">' . $row_uni['Name'] . '</option>
              ';
                $uni_Id = $row_uni['Id'];
                $uni_name = $row_uni['Name'];
            } else {
                echo '
              <option value="' . $row_uni['Name'] . '">' . $row_uni['Name'] . '</option>
               ';
            }
        }
    }
    echo '
                                </select>
                            </td>
                        </tr>
                        
                        ';
    if (!empty($_GET['uni']) && $_GET['uni'] == $uni_name) {

        echo '			    
			    <tr>
                            <td><label for="Name_college"><span style="color: red">*</span> Choose College: </label></td>
                            <td>
                                <select name="Name_college" class="form-control" id="Name_college" onchange="location.href=\'ControlPanel.php?CP=Update_College&uni=' . $_GET['uni'] . '&college=\'+this.value">
                                <option value="Choose College">Choose College</option>
                                ';

        $college_name = '';
        $college_Id = '';
        $result_college = $con->query("SELECT * FROM college WHERE University_Id=$uni_Id");
        if ($result_college->num_rows > 0) {
            while ($row_college = $result_college->fetch_assoc()) {
                if ($_GET['college'] == $row_college['Name']) {
                    echo '
              <option selected value="' . $row_college['Name'] . '">' . $row_college['Name'] . '</option>
              ';
                    $college_name = $row_college['Name'];
                    $college_Id = $row_college['Id'];
                } else {
                    echo '
              <option value="' . $row_college['Name'] . '">' . $row_college['Name'] . '</option>
               ';
                }
            }
        }
        echo '
                                </select>
                            </td>
                        </tr>
                        
                        ';

        if(!empty($_GET['college']) && $_GET['college'] == $college_name){

        $result_college = $con->query("SELECT * FROM college WHERE Name='$college_name'");
        if ($result_college->num_rows > 0) {
            while ($row_college = $result_college->fetch_assoc()) {
                echo '
                        <input type="text" value="' . $college_name . '" name="real_name_uni" style="display: none">
                        <tr>
                            <td><label for="Name_college"><span style="color: red">*</span> Name of College: </label></td>
                            <td><input type="text" class="form-control" name="Name_college" id="Name_college" value="' . $row_college['Name'] . '" placeholder="Name of college" autofocus required></td>
                        </tr>
                    ';
            }
        }

        if(!empty($_GET['dep'])) {
            $dep_id = '';
            $dep_name = '';
            $result_dep = $con->query("SELECT * FROM department");
            if ($result_dep->num_rows > 0) {
                while ($row_dep = $result_dep->fetch_assoc()) {
                    if ($row_dep['Name'] == $_GET['dep']) {
                        $dep_id = $row_dep['Id'];
                        $dep_name = $row_dep['Name'];
                    }
                }
            }
        }

        if (!empty($_GET['dep']) && $_GET['dep'] == $dep_name){
            $result_dep = $con->query("SELECT * FROM department WHERE Id=$dep_id");
            if ($result_dep->num_rows > 0) {
                while ($row_dep = $result_dep->fetch_assoc()) {
                    echo '
                        <tr>
                            <td><label for="Name_dep"><span style="color: red">*</span> Name of department: </label></td>
                            <td><input type="text" class="form-control" name="Name_dep1" id="Name_dep1" value="' . $row_dep['Name'] . '" placeholder="Name of department" autofocus required></td>
                        </tr>
                    ';
                }
            }
            echo '
                </table>
                    <div align="center">
                        <input type="submit" value="Update College" name="Update_College" class="Update_College btn btn-green"/>
                        <input type="reset" value="Reset" name="reset_uni" class="btn btn-red margin-left"/>
                    </div>
            ';
        } else {

            $count_dep = '1';
            $result_dep = $con->query("SELECT * FROM department WHERE College_Id=$college_Id");
            if ($result_dep->num_rows > 0) {
                while ($row_dep = $result_dep->fetch_assoc()) {
                    echo '
                        <tr>
                            <td><label for="Name_dep"><span style="color: red">*</span> Name of department ' . $count_dep . ': </label></td>
                            <td><input type="text" class="form-control" name="Name_dep' . $count_dep . '" id="Name_dep' . $count_dep . '" value="' . $row_dep['Name'] . '" placeholder="Name of department" autofocus required></td>
                        </tr>
                    ';
                    $count_dep++;
                }
            }
            echo '
                </table>
                    <div align="center">
                        <input type="submit" value="Update College" name="Update_College" class="Update_College btn btn-green"/>
                        <input type="reset" value="Reset" name="reset_uni" class="btn btn-red margin-left"/>
                    </div>
            ';
        }
        }
        echo '</table>';
    }
    echo '
                </table>
          </form>
</div>
';
}else{
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px; padding-bottom: 17%" " align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}


?>