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
        <form id="register-form" method="post" action="System/Admin_Add_user.php">
                    <legend style="text-transform: uppercase">Add user</legend>
        
        <div class="row">
                 
                <div class="form-group col-md-12">
                    <select class="form-control" name="select_user" onchange="this.style.borderColor = \'lightgrey\'" style="border-color: #ff3030" required>
                        <option value="">Select Type of User</option>
                        <option value="dean">Dean</option>
                        <option value="author">Author</option>
                    </select>
                </div>
                
                <div class="form-group col-md-6">
                    <input class="form-control" name="firstName" placeholder="First name" type="text">
                </div>
        
                <div class="form-group col-md-6">
                    <input class="form-control" name="secondName" placeholder="Last name" type="text">
                </div>
        
                <div class="form-group col-md-12">
                    <input class="form-control" name="email" placeholder="Email address - Ex : ( example@example.com )" type="email">
                </div>
        
                <div class="form-group col-md-6">
                    <input class="form-control" name="username" placeholder="User name" type="text">
                </div>
        
                <div class="form-group col-md-6">
                    <input class="form-control" name="phone" placeholder="Phone number" type="text">
                </div>
        
                <div class="clearfix">
                </div>
        
                <div class="form-group col-md-6">
                    <input class="form-control" name="password" id="password" placeholder="Password" type="password">
                </div>
                <div class="form-group col-md-6">
                    <input class="form-control" name="password2" placeholder="Re-enter password" type="password">
                </div>
                <div class="clearfix">
                </div>
        
                <div class="form-group col-md-6">
                    <input class="form-control" name="website" placeholder="Website - Ex : ( http://www.example.com )" type="url">
                </div>
        
                <div class="form-group col-md-6">
                    <input class="form-control" type="date" name="Date_of_berth" placeholder="Date of berth" id="Date_of_berth"/>
                </div>
        
                <div class="form-group col-md-6">
                    <select class="form-control" id="selectCitys" name="country" required>
                        <optgroup label="Country">
                            <option value="">Choose Country ---</option>
                            <option value="Soudi Arabia">Soudi Arabia</option>
                        </optgroup>
                    </select>
                </div>
                
                <div  class="form-group col-md-6">
                    <select class="form-control" id="selectUniversitys" name="city" required>
                        <optgroup label="City" style="width: 200px">
                            <option value="">Choose City ---</option>
                            <option value="Madinah">Madinah</option>
                        </optgroup>
                    </select>
                </div>
                
                <div class="form-group col-md-12">
                    <div style="margin-left: 45px; margin-right: 25px; margin-bottom: 10px">
                        <legend>Gender</legend>
                        <label style="margin-right: 10px"><input type="radio" value="Male" name="gender" id="M_gender" checked required/> Male</label>
                        <label><input type="radio" value="Female" name="gender" id="F_gender" required/> Female</label>
                    </div>
                </div>
        
               
                <div class="col-md-6">
                    <input class="btn btn-primary" id="submit-button" type="submit" value="Sign Up">
                </div>
        </div>
            </form>
    ';
}else{
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px; padding-bottom: 17%" " align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}

?>