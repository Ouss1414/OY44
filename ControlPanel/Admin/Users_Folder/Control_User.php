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
    <div class="col-md-6">
    <p>Search User</p>
        <input type="text" id="Admin_Search" class="form-control margin-bottom" onchange="location.href=\'ControlPanel.php?CP=Control_User&search=\'+ this.value" placeholder="Search by User Name or Email">
    </div>
    
    <div class="col-md-6">
    <p>or Select User</p>
        <select class="form-control" onchange="location.href=\'ControlPanel.php?CP=Control_User&search=\'+ this.value" placeholder="Search by User Name or Email">
        <option value="">Choose user</option>
        <optgroup label="-------------------------------------------------- Admins --------------------------------------------------">
        ';
            //User
        $sql_User = "SELECT * FROM user WHERE User_Type='admin'";
        $result_user = $con->query($sql_User);
        if ($result_user->num_rows > 0) {
            while ($row_User = $result_user->fetch_assoc()) {
                if ($_GET['search'] == $row_User['User_Name'] || $_GET['search'] == $row_User['Email']) {
                    echo '
                        <option selected value="' . $row_User['User_Name'] . '">' . $row_User['User_Name'] . '</option>
                        ';
                } else {
                    echo '
                        <option value="' . $row_User['User_Name'] . '">' . $row_User['User_Name'] . '</option>
                    ';
                }
            }
        }
    echo '
             </optgroup>
             <optgroup label="-------------------------------------------------- Authors --------------------------------------------------">
        ';
            //User
        $sql_User = "SELECT * FROM user WHERE User_Type='author'";
        $result_user = $con->query($sql_User);
        if ($result_user->num_rows > 0) {
            while ($row_User = $result_user->fetch_assoc()) {
                if ($_GET['search'] == $row_User['User_Name'] || $_GET['search'] == $row_User['Email']) {
                    echo '
                        <option selected value="' . $row_User['User_Name'] . '">' . $row_User['User_Name'] . '</option>
                        ';
                } else {
                    echo '
                        <option value="' . $row_User['User_Name'] . '">' . $row_User['User_Name'] . '</option>
                    ';
                }
            }
        }
    echo '
             </optgroup>
             <optgroup label="--------------------------------------------------- Deans ---------------------------------------------------">
        ';
            //User
        $sql_User = "SELECT * FROM user WHERE User_Type='dean'";
        $result_user = $con->query($sql_User);
        if ($result_user->num_rows > 0) {
            while ($row_User = $result_user->fetch_assoc()) {
                if ($_GET['search'] == $row_User['User_Name'] || $_GET['search'] == $row_User['Email']) {
                    echo '
                        <option selected value="' . $row_User['User_Name'] . '">' . $row_User['User_Name'] . '</option>
                        ';
                } else {
                    echo '
                        <option value="' . $row_User['User_Name'] . '">' . $row_User['User_Name'] . '</option>
                    ';
                }
            }
        }
    echo '
             </optgroup>
             <optgroup label="-------------------------------------------------- Doctors --------------------------------------------------">
        ';
            //User
        $sql_User = "SELECT * FROM user WHERE User_Type='doctor'";
        $result_user = $con->query($sql_User);
        if ($result_user->num_rows > 0) {
            while ($row_User = $result_user->fetch_assoc()) {
                if ($_GET['search'] == $row_User['User_Name'] || $_GET['search'] == $row_User['Email']) {
                    echo '
                        <option selected value="' . $row_User['User_Name'] . '">' . $row_User['User_Name'] . '</option>
                        ';
                } else {
                    echo '
                        <option value="' . $row_User['User_Name'] . '">' . $row_User['User_Name'] . '</option>
                    ';
                }
            }
        }
    echo '
             </optgroup>
             <optgroup label="--------------------------------------------------- Users ---------------------------------------------------">
        ';
            //User
        $sql_User = "SELECT * FROM user WHERE User_Type='user'";
        $result_user = $con->query($sql_User);
        if ($result_user->num_rows > 0) {
            while ($row_User = $result_user->fetch_assoc()) {
                if ($_GET['search'] == $row_User['User_Name'] || $_GET['search'] == $row_User['Email']) {
                    echo '
                        <option selected value="' . $row_User['User_Name'] . '">' . $row_User['User_Name'] . '</option>
                        ';
                } else {
                    echo '
                        <option value="' . $row_User['User_Name'] . '">' . $row_User['User_Name'] . '</option>
                    ';
                }
            }
        }
    echo '
             </optgroup>
        </select>
    </div>
    ';

    if (!empty($_GET['search'])){
        $search_user_name = $_GET['search'];
        //User
        $sql_User = "SELECT * FROM user WHERE User_Name='$search_user_name' OR Email='$search_user_name'";
        $result_user = $con->query($sql_User);
        if ($result_user->num_rows > 0) {
            while ($row_User = $result_user->fetch_assoc()) {
                if (empty($row_User['Image'])) {
                    $row_User['Image'] = 'defult.png';
                }
                echo '
    <div class="row">
    
        <div class="form-group col-md-12" align="center" style="margin-top: 3%; margin-bottom: 3%">
        ';
                if ($row_User['Block_User'] == '1') {
                    echo '
                        <a class="UnBlock_User btn btn-red" id="'.$row_User['Id'].'" name="UnBlock_User" title="Unblock User" style="float: right"><i class="entypo-block"></i></a>
                        ';
                    } else {
                    echo '
                        <a class="Block_User btn btn-red" id="'.$row_User['Id'].'" name="Block_User" title="Block User" style="float: right"><i class="entypo-block"></i></a>
                    ';
                    }
                    echo '
            <img src="Images/Pic/'.$row_User['Image'].'" alt="avatar" style="border-radius: 50px;width: 100px;height: 100px">
            ';
                if ($row_User['Block_User'] == '1') {
                    echo '
                        <p style = "margin-left: -4.5%; margin-top: 1%; color: #ff3030; font-size: 15px" >Blocked</p >
                        ';
                    } else {
                    echo '
                        <p style = "margin-left: -4.5%; margin-top: 1%; color: #0fbd71; font-size: 15px" >Availabe</p >
                    ';
                    }
                    echo '
        </div>
        
        <div class="form-group col-md-6">
            <p>User Type</p>
            <label class="form-control">'.$row_User['User_Type'].'</label>
        </div>
        
        <div class="form-group col-md-6">
            <p>User Name</p>
            <label class="form-control">'.$row_User['User_Name'].'</label>
        </div>
        
        <div class="form-group col-md-6">
            <p>First Name</p>
            <label class="form-control">'.$row_User['First_Name'].'</label>
        </div>
        
        <div class="form-group col-md-6">
            <p>Last Name</p>
            <label class="form-control">'.$row_User['Last_Name'].'</label>
        </div>
        
        <div class="form-group col-md-6">
            <p>Email</p>
            <label class="form-control">'.$row_User['Email'].'</label>
        </div>
        
        <div class="form-group col-md-6">
            <p>Gender</p>
            <label class="form-control">'.$row_User['Gender'].'</label>
        </div>
        
        <div class="form-group col-md-6">
            <p>Phone Number</p>
            <label class="form-control">'.$row_User['Phone_Number'].'</label>
        </div>
        
        ';
                if ($row_User['User_Type'] == 'user') {
                    echo '
        <div class="form-group col-md-6">
            <p>Academic Number</p>
            <label class="form-control">' . $row_User['Academic_Number'] . '</label>
        </div>
        
        ';
                }
                echo '
        
        <div class="form-group col-md-6">
            <p>Date od birth</p>
            <label class="form-control">'.$row_User['Date_Of_Birth'].'</label>
        </div>
        
        <div class="form-group col-md-6">
            <p>Country</p>
            <label class="form-control">'.$row_User['Country'].'</label>
        </div>
        
        <div class="form-group col-md-6">
            <p>City</p>
            <label class="form-control">'.$row_User['City'].'</label>
        </div>
        
        ';
                if ($row_User['User_Type'] == 'user') {
                    echo '
        
        <div class="form-group col-md-6">
            <p>University</p>
            <label class="form-control">'.$row_User['University'].'</label>
        </div>
        
        <div class="form-group col-md-6">
            <p>College</p>
            <label class="form-control">'.$row_User['College'].'</label>
        </div>
        
        <div class="form-group col-md-6">
            <p>Department</p>
            <label class="form-control">'.$row_User['Department'].'</label>
        </div>

            ';
                }
                echo '
    </div>
    ';
            }
        }
    }
}else{
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px; padding-bottom: 17%" " align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}

?>