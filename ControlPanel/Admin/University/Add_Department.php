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
        <strong>Add University</strong>
    </li>
</ol>

<div class="row">
    <h2 class="margin-bottom" align="center">Add Department</h2>	
    
				<div class="tab-pane active" id="tab1" align="center">
				     <table class="table" style="max-width: 70%">
                        <tr>
                            <td><label for="Name_uni"><span style="color: red">*</span> Choose University: </label></td>
                            <td>
                                <select name="Name_uni" class="form-control" id="Name_uni" onchange="location.href=(\'ControlPanel.php?CP=Add_Department&uni=\'+this.value)">
                                <option value="">Choose University</option>
                                ';
    $result_uni = $con->query("SELECT * FROM university");
    if($result_uni->num_rows > 0){
        while ($row_uni = $result_uni->fetch_assoc()){
            if($_GET['uni'] == $row_uni['Id']){
                echo '
              <option selected value="'.$row_uni['Id'].'">'.$row_uni['Name'].'</option>
               ';
            }else {
                echo '
              <option value="'.$row_uni['Id'].'">'.$row_uni['Name'].'</option>
               ';
            }
        }
    }
    echo '
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="Name_college"><span style="color: red">*</span> Choose College: </label></td>
                            <td>
                                <select name="Name_college" class="form-control" id="Name_college">
                                <option value="">Choose College</option>
                                ';
    $result_college = $con->query("SELECT * FROM college WHERE University_Id=$_GET[uni]");
                                if($result_college->num_rows > 0){
                                    while ($row_college = $result_college->fetch_assoc()){
                                        echo '
                                          <option value="'.$row_college['Id'].'">'.$row_college['Name'].'</option>
                                           ';
                                    }
                                }
                                    echo '
                                </select>
                            </td>
                        </tr>
            
                    </table>
                    
                    <table id="AddDepartmentGroup" class="table" style="max-width: 70%">
                        
                            <div id="AddDepartment1">
                                <tr id="AddDepartment1">
                                    <td><label for="Name_dep"><span style="color: red">*</span> Name of Department 1: </label></td>
                                    <td><input type="text" class="form-control" name="Name_dep1" id="Name_dep1" placeholder="Name of Department" autofocus required></td>
                                </tr>
                            </div>
                    </table>
                    
                    <table class="table" style="max-width: 70%">
                        <tr>
                            <td><a id="addButtondep" style="cursor: pointer">+ Add more department ... </a></td>
                            <td><a id="removeButtondep" style="cursor: pointer">- Remove text filed</a></td>
                        </tr>
                    </table>
                    
                </div>
                
                    <div align="center">
                        <input type="submit" value="Add Department" name="Add_Department" class="Add_Department btn btn-green"/>
                        <input type="reset" value="Reset" name="reset_uni" class="btn btn-red margin-left"/>
                    </div>
                
</div>

<hr />
    ';
}else{
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px; padding-bottom: 17%" " align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}


?>