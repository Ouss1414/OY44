<?php

function getPic(){
    $con = new mysqli('localhost','root','','iebook');
    $Name_User = $_SESSION['user'];

    //User
    $sql_User = "SELECT Image FROM user WHERE  User_Name = '$Name_User'";
    $result_user = $con->query($sql_User);
    if ($result_user->num_rows > 0) {
        while ($row_User = $result_user->fetch_assoc()) {

            echo '
                <a href="../../index.php?pid=Profile" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><img src="../../Images/Pic/'.$row_User['Image'].'" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a> 
                ';
        }
    }
}

function Edit_Profile(){

    $con = new mysqli('localhost','root','','iebook');

    $Name_User = $_SESSION['user'];

    //User
    $sql_User = "SELECT * FROM user WHERE  User_Name = '$Name_User'";
    $result_user = $con->query($sql_User);
    if ($result_user->num_rows > 0) {
        while ($row_User = $result_user->fetch_assoc()) {
            echo '
        <div class="w3-row" style="padding: 20px;  margin-left: 10%; margin-right: 10%">

                    <!-- edit form column -->
           <form id="Edit-Profile-form" method="post" action="Edit_Profile_Proccess.php" enctype="multipart/form-data">
                    <!-- left column -->
                    <div class="w3-row m3 w3-margin-bottom">
                        <div class="w3-center">
                            <img src="../../Images/Pic/'.$row_User['Image'].'" class="w3-circle" alt="avatar" style="width: 100px;height: 100px">
                            <input type="file" name="photo" title="upload photo" style="margin-left: 41%; margin-top: 15px; margin-bottom: 15px">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <input class="form-control" name="firstName" value="'.$row_User['First_Name'].'" placeholder="First name" type="text">
                    </div>

                    <div class="form-group col-md-6">
                        <input class="form-control" name="secondName" value="'.$row_User['Last_Name'].'" placeholder="Last name" type="text">
                    </div>

                    <div class="form-group col-md-12">
                        <input class="form-control" name="email" value="'.$row_User['Email'].'" placeholder="Email address - Ex : ( example@example.com )" type="email">
                    </div>

                    <div class="form-group col-md-4">
                        <input class="form-control" name="username" value="'.$row_User['User_Name'].'" placeholder="User name" type="text" disabled>
                    </div>

                    <div class="form-group col-md-4">
                        <input class="form-control" name="phone" value="'.$row_User['Phone_Number'].'" placeholder="Phone number" type="text">
                    </div>

                    <div class="form-group col-md-4">
                        <input class="form-control" type="text" name="Academic_Number" value="'.$row_User['Academic_Number'].'" placeholder="Academic number" id="Academic_Number" />
                    </div>

                    <div class="clearfix">
                    </div>

                    <div class="form-group col-md-6">
                        <input class="form-control" name="password" value="'.$row_User['Password'].'" id="password" placeholder="Password" type="password">
                    </div>
                    <div class="form-group col-md-6">
                        <input class="form-control" name="password2" value="'.$row_User['Password'].'" placeholder="Re-enter password" type="password">
                    </div>
                    <div class="clearfix">
                    </div>

                    <div class="form-group col-md-12">
                        <input class="form-control" name="website" value="'.$row_User['Web_Site'].'" placeholder="Website - Ex : ( http://www.example.com )" type="url">
                    </div>

                    <div class="form-group col-md-6">
                        <input class="form-control" type="date" name="Date_of_berth" value="'.$row_User['Date_Of_Birth'].'" placeholder="Date of berth" id="Date_of_berth"/>
                    </div>

                    <div class="form-group col-md-6">
                        <select class="form-control" name="country">
                        <option value="'.$row_User['Country'].'">'.$row_User['Country'].'</option>
                            <option value="null">Choose Country ---</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <select class="form-control" name="city">
                            <option value="'.$row_User['City'].'">'.$row_User['City'].'</option>
                            <option value="null" style="width: 200px">Choose City ---</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <select class="form-control" name="university">
                            <option value="'.$row_User['University'].'">'.$row_User['University'].'</option>
                            <option value="null">Choose University ---</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <select class="form-control" name="college">
                            <option value="'.$row_User['College'].'">'.$row_User['College'].'</option>
                            <option value="null">Choose College ---</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <select class="form-control" name="department">
                            <option value="'.$row_User['Department'].'">'.$row_User['Department'].'</option>
                            <option value="null">Choose Department ---</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <div style="margin-left: 45px; margin-right: 25px; margin-bottom: 10px">
                            <legend>Gender</legend>
                            ';
            if ($row_User['Gender'] == 'M'){
                echo '<label style="margin-right: 10px"><input type="radio" value="Male" name="gender" id="M_gender" checked required/> Male</label>
                      <label><input type="radio" value="Female" name="gender" id="F_gender" required/> Female</label>
                    ';
            }else{
                echo '
                      <label style="margin-right: 10px"><input type="radio" value="Male" name="gender" id="M_gender" required/> Male</label>
                      <label><input type="radio" value="Female" name="gender" id="F_gender" checked required/> Female</label>
                     ';

                 }
            echo '
                        </div>
                    </div>
                 <div>
                    <input class="btn btn-primary" id="submit-button" type="submit" value="Edit Profile">
                 </div>

                </form>
        </div>
    ';
        }
    }
}

function PostOperations($Name_University,$Name_College,$Name_Department,$Name_Subject){

    $con = new mysqli('localhost','root','','iebook');

    echo '
        <div class="w3-margin-top w3-margin-left w3-padding-small w3-hover-text-gray w3-text-blue">
            <a href="index.php?pid=Home">Home</a> -
            <a href="index.php#University" style="text-transform: uppercase">'.$Name_University.'</a> -
            <a href="index.php?pid=Colleges&uni='.$Name_University.'" style="text-transform: uppercase">College_of_'.$Name_College.' </a> -
            <a href="index.php?pid=Department&uni='.$Name_University.'&college='.$Name_College.'&dep='.$Name_Department.'" style="text-transform: uppercase"> '.$Name_Department.'</a> -
            <a href="index.php?pid=Posts&uni='.$Name_University.'&college='.$Name_College.'&dep='.$Name_Department.'&sub='.$Name_Subject.'" style="text-transform: uppercase"> '.$Name_Subject.'</a>
        </div>
        
        <div class="w3-row">
        ';

        //Post
            $sql_Post_User = "SELECT * FROM post WHERE Subject = '$Name_Subject'";
            $result_Post = $con->query($sql_Post_User);
            if($result_Post->num_rows > 0) {
                while ($row_Post = $result_Post->fetch_assoc()) {

                    //User
                    $sql_User = "SELECT * FROM user WHERE  Id = $row_Post[User_Id]";
                    $result_user = $con->query($sql_User);
                    if ($result_user->num_rows > 0) {
                        while ($row_User = $result_user->fetch_assoc()) {
                            if($row_User['User_Type'] = 'dean' || $row_User['User_Type'] = 'doctor' )
                            $Name_User = 'D.' . $row_User['User_Name'];
                            else $Name_User = $row_User['User_Name'];
                        }
                    }
         echo '
            <!-- left Column -->
            <div class="w3-col m10">
        
                <!-- Background Post -->
                <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-margin" style="width: 95%;min-height: 400px">
        
                    <!-- Head Posts -->
                    <div class="w3-display-container w3-center w3-margin-bottom">
                        <div class="w3-display-topleft w3-dark-grey w3-padding" style="text-transform: uppercase;margin-top: 10px;width: 100%">Subject: '.$row_Post['Subject'].'</div>
                    </div>
        
                    <!-- Border -->
                    <div class="w3-border-bottom w3-margin-left w3-margin-right" style="margin-top: 70px"></div>
        
                    <!-- Post -->
                    <div class="w3-row" style="margin: 5px 0 0 50px;">
                        <div  class="w3-padding" style="width: 95%; min-height: 110px;margin-left: 2.5%;">
                            <div class="w3-col s1">
                                <div class="w3-row s1 w3-text-black" style="text-align: left;margin: 5px;width: 1000px">Date: <i>'.$row_Post['Date_Post'].'</i></div>
                                <div class="w3-row s1 w3-text-black" style="text-align: left;margin: 5px;width: 1000px">writer: <i>'.$Name_User.'</i></div>
                                <div class="w3-row w3-margin-bottom" style="display: inline">
                                    <div title="LIKE" class="fa fa-thumbs-up w3-large w3-hover-green w3-padding" style="min-width: 70px;"> '.$row_Post['Like'].' </div>
                                    <div title="DISLIKE" class="fa fa-thumbs-down w3-large w3-hover-red w3-padding" style="min-width: 70px;"> '.$row_Post['Dislike'].' </div>
                                </div>   
                            </div>
                        </div>
                    </div>
        
                    <!-- Border -->
                    <div class="w3-border-bottom w3-margin-right w3-margin-left"></div>
        
                    <div class="w3-text-black w3-large w3-padding-48" style="margin: 0 50px 0 50px" >
                        '.$row_Post['Message'].'
                    </div>
                </div>
            </div>
        ';
        }
    }
        $sql_ads = "SELECT * FROM Ads";
        $result_Ads = $con->query($sql_ads);
        if($result_Ads->num_rows > 0){
            while ($row_Ads = $result_Ads->fetch_assoc()){
                echo '
                    <!-- right column -->
                    <div class="w3-col m2">
                        <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center w3-margin-top" style="margin-left: -10%; width: 230px;height: 630px">
                            <div><img src="Images/'.$row_Ads['Image'].'" alt="advertising" /></div>
                        </div>
                    </div>
                    ';
            }
        }
        echo '</div>';
}

function DepartmentOperations($Name_University,$Name_College,$Name_Department){

    $con = new mysqli('localhost', 'root','' , 'iebook');

    //Department
    $sql_Department = "SELECT Id FROM department WHERE  Name = '$Name_Department'";
    $result_Department = $con->query($sql_Department);
    if($result_Department->num_rows > 0) {
        while ($row_Department = $result_Department->fetch_assoc()) {
            $Id_Department = $row_Department['Id'];
        }
    }

    echo '
        <div class="w3-margin-top w3-margin-left w3-padding-small w3-hover-text-gray w3-text-blue">
            <a href="index.php?pid=Home">Home</a>  -
            <a href="index.php#University" style="text-transform: uppercase"> '.$Name_University.'</a>  -
            <a href="index.php?pid=Colleges&uni='.$Name_University.'" style="text-transform: uppercase">College_of_ '.$Name_College.' </a> -
            <a href="index.php?pid=Department&uni='.$Name_University.'&college='.$Name_College.'&dep='.$Name_Department.'" style="text-transform: uppercase"> '.$Name_Department.'</a>
        </div>
        
        <div class="w3-row w3-card-2 w3-margin-top w3-margin-left w3-margin-right w3-padding">
            <a href="index.php?pid=Add_Post&uni='.$Name_University.'&college='.$Name_College.'&dep='.$Name_Department.'" class="w3-button w3-border" style="text-decoration: none">Add Post</a>  -
            <select class="w3-theme-2 w3-margin" style="width: 15%">
                <option value="null">Sort --- </option>
                <option value="ORDER BY Date_Post DESC">Date</option>
                <option value="ORDER BY Subject ASC">Name</option>
            </select>
        </div>
        
        <div class="w3-row">
        
            <!-- left Column -->
            <div class="w3-col m4">
        
                <!-- Background Post -->
                <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center w3-margin" style="width: 95%;min-height: 600px">
                    <!-- Border -->
                    <div class="w3-border-bottom"></div>
        
                    <!-- Head Posts -->
                    <div class="w3-display-container">
                        <div class="w3-display-topleft w3-dark-grey w3-padding" style="text-transform: uppercase;margin-top: 10px;width: 100%">Dean</div>
                    </div>
        
                    <!-- Border -->
                    <div class="w3-border-bottom" style="margin-top: 13%"></div>
                ';

            //Post
            $sql_Post_User = "SELECT * FROM post WHERE Department_Id = $Id_Department ";
            $result_Post = $con->query($sql_Post_User);
            if($result_Post->num_rows > 0) {
                while ($row_Post = $result_Post->fetch_assoc()) {

                    //Dean
                    $sql_User = "SELECT * FROM user WHERE  Id = $row_Post[User_Id] AND User_Type = 'dean'";
                    $result_user = $con->query($sql_User);
                    if ($result_user->num_rows > 0) {
                        while ($row_User = $result_user->fetch_assoc()) {
                            $Name_User = 'D.' . $row_User['User_Name'];
                        }
                    }else{continue;}
                    echo'
                        <!-- Post -->
                        <div class="w3-row" style="margin-top: 15px; cursor: pointer" onclick="window.location.href=\'index.php?pid=Posts&uni=' . $Name_University . '&college=' . $Name_College . '&dep=' . $Name_Department . '&sub=' . $row_Post['Subject'] . '\'">
                            <div  class="w3-padding w3-theme-d2" style="width: 95%; min-height: 110px;margin-left: 2.5%;">
                                <div class="w3-col s1">
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">Subject: <i>' . $row_Post['Subject'] . '</i></div>
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">writer: <i>' . $Name_User . '</i></div>
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">Date: <i>'.$row_Post['Date_Post'].'</i></div>
                                </div>
                            </div>
                        </div>
                        <div class="w3-dark-grey" style="width: 95%;margin-left: 2.5%;padding-bottom: 3px;padding-top: 3px">
                            <div title="LIKE" class="fa fa-thumbs-up w3-large w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Like'].' </div>
                            <div title="DISLIKE" class="fa fa-thumbs-down w3-large w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Dislike'].' </div>
                        </div>
                    ';
                }

            }else{
                echo '<div class="w3-center w3-text-red w3-padding-32 w3-xlarge"> No Posts</div>';
            }

             echo'
                </div>
                <!-- End Background Post For Dean -->
            </div>
            <!-- End Left column -->
        
        
            <!-- Middle Column -->
            <div class="w3-col m4">
        
                <!-- Background Post -->
                <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center w3-margin" style="width: 95%;min-height: 600px">
                    <!-- Border -->
                    <div class="w3-border-bottom"></div>
        
                    <!-- Head Posts -->
                    <div class="w3-display-container">
                        <div class="w3-display-topleft w3-dark-grey w3-padding" style="text-transform: uppercase;margin-top: 10px;width: 100%">Doctor</div>
                    </div>
        
                    <!-- Border -->
                    <div class="w3-border-bottom" style="margin-top: 13%"></div>
                    ';
            //Post
            $sql_Post_User = "SELECT * FROM post WHERE Department_Id = $Id_Department ";
            $result_Post = $con->query($sql_Post_User);
            if($result_Post->num_rows > 0) {
                while ($row_Post = $result_Post->fetch_assoc()) {

                    //Doctor
                    $sql_User = "SELECT * FROM user WHERE  Id = $row_Post[User_Id] AND User_Type = 'doctor'";
                    $result_user = $con->query($sql_User);
                    if ($result_user->num_rows > 0) {
                        while ($row_User = $result_user->fetch_assoc()) {
                            $Name_User = 'D.' . $row_User['User_Name'];
                        }
                    }else{continue;}

                    echo '
                        <!-- Post -->
                        <div class="w3-row" style="margin-top: 15px; cursor: pointer" onclick="window.location.href=\'index.php?pid=Posts&uni=' . $Name_University . '&college=' . $Name_College . '&dep=' . $Name_Department . '&sub=' . $row_Post['Subject'] . '\'">
                            <div  class="w3-padding w3-theme-d2" style="width: 95%; min-height: 110px;margin-left: 2.5%;">
                                <div class="w3-col s1">
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">Subject: <i>' . $row_Post['Subject'] . '</i></div>
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">writer: <i>' . $Name_User . '</i></div>
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">Date: <i>'.$row_Post['Date_Post'].'</i></div>
                                </div>
                            </div>
                        </div>
                        <div class="w3-dark-grey" style="width: 95%;margin-left: 2.5%;padding-bottom: 3px;padding-top: 3px">
                            <div title="LIKE" class="fa fa-thumbs-up w3-large w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Like'].' </div>
                            <div title="DISLIKE" class="fa fa-thumbs-down w3-large w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Dislike'].' </div>
                        </div>
                    ';
        }

    }else{
        echo '<div class="w3-center w3-text-red w3-padding-32 w3-xlarge"> No Posts</div>';
    }
          echo '
                </div>
                <!-- End Background Post For Doctor -->
            </div>
            <!-- End Middle column -->
        
        
            <!-- Right Column -->
            <div class="w3-col m4">
        
                <!-- Background Post -->
                <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center w3-margin" style="width: 95%;min-height: 600px">
                    <!-- Border -->
                    <div class="w3-border-bottom"></div>
        
                    <!-- Head Posts -->
                    <div class="w3-display-container">
                        <div class="w3-display-topleft w3-dark-grey w3-padding" style="text-transform: uppercase;margin-top: 10px;width: 100%">Student</div>
                    </div>
        
                    <!-- Border -->
                    <div class="w3-border-bottom" style="margin-top: 13%"></div>
        ';

        //Post
        $sql_Post_User = "SELECT * FROM post WHERE Department_Id = $Id_Department ";
        $result_Post = $con->query($sql_Post_User);
        if($result_Post->num_rows > 0) {
            while ($row_Post = $result_Post->fetch_assoc()) {

                //User
                $sql_User = "SELECT * FROM user WHERE  Id = $row_Post[User_Id] AND User_Type = 'user'";
                $result_user = $con->query($sql_User);
                if($result_user->num_rows > 0) {
                    while ($row_User = $result_user->fetch_assoc()) {
                        $Name_User = $row_User['User_Name'];
                    }
                }else{continue;}
                        echo '
                        <!-- Post -->
                        <div class="w3-row" style="margin-top: 15px; cursor: pointer" onclick="window.location.href=\'index.php?pid=Posts&uni=' . $Name_University . '&college=' . $Name_College . '&dep=' . $Name_Department . '&sub=' . $row_Post['Subject'] . '\'">
                            <div  class="w3-padding w3-theme-d2" style="width: 95%; min-height: 110px;margin-left: 2.5%;">
                                <div class="w3-col s1">
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">Subject: <i>' . $row_Post['Subject'] . '</i></div>
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">writer: <i>' . $Name_User . '</i></div>
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">Date: <i>'.$row_Post['Date_Post'].'</i></div>
                                </div>
                            </div>
                        </div>
                        <div class="w3-dark-grey" style="width: 95%;margin-left: 2.5%;padding-bottom: 3px;padding-top: 3px">
                                <div title="LIKE" class="fa fa-thumbs-up w3-large w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Like'].' </div>
                                <div title="DISLIKE" class="fa fa-thumbs-down w3-large w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Dislike'].' </div>
                            </div>
                    ';
            }
        }else{
            echo '<div class="w3-center w3-text-red w3-padding-32 w3-xlarge"> No Posts</div>';
        }

        echo '
                </div>
                <!-- End Background Post For Student -->
            </div>
            <!-- End Right column -->
        </div>
        ';
}

function CollegeOprations($Name_University){

    $con = new mysqli('localhost', 'root','' , 'iebook');

    // University
    $sql_University = "SELECT * FROM university WHERE Name = '$Name_University'";
    $result_University = $con->query($sql_University);
    if($result_University->num_rows > 0) {
        while ($row_University = $result_University->fetch_assoc()) {
            $Id_University = $row_University['Id'];
        }
    }
        echo '
                <div class="w3-margin-top w3-margin-left w3-padding-small w3-hover-text-gray w3-text-blue">
                    <a href="index.php?pid=Home" style="text-transform: uppercase">Home</a> -
                    <a href="index.php#University" style="text-transform: uppercase">'. $Name_University .'</a> - COLLEGES
                </div>
                <div class="w3-row">
            ';

        //College
        $sql_College = "SELECT * FROM college WHERE University_Id = $Id_University";
        $result_college = $con->query($sql_College);
        if($result_college->num_rows > 0) {
            while ($row_College = $result_college->fetch_assoc()) {
                $Id_College = $row_College['Id'];
                $Name_College = $row_College['Name'];

            // Department
            $sql_Department = "SELECT * FROM department WHERE College_Id = $Id_College ";
            $result_Department = $con->query($sql_Department);
            if ($result_Department->num_rows > 0) {
                echo '
                    <!-- Grid -->
                    <div class="w3-col m4" style="min-height: 300px">
                        <div class="w3-row-padding w3-margin-bottom w3-margin" id="plans">
                                <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                                   <li class="w3-theme-d2 w3-large w3-padding-32">College of ' . $Name_College . '</li>
                    ';
                                    while ($row_Department = $result_Department->fetch_assoc()) {
                                        $Name_Department = $row_Department['Name'];
                                        echo '
                                            <li class="w3-padding-16"><a href="index.php?pid=Department&uni=' . $Name_University . '&college=' . $Name_College . '&dep=' . $Name_Department . '"><b>' . $Name_Department . '</b></a></li>            
                                             ';
                }
                echo '
                                </ul>
                        </div>
                     </div>
                    ';
            }else {
                echo '<div class="w3-text-red w3-padding-48 w3-center" style="margin-top: 12%; margin-bottom: 20%;font-size: 40px; text-transform: uppercase">' . $Name_University . ' It currently has no colleges</div>';
            }
        }
        echo '</div>';
    }
    mysqli_close($con);
}

function HomeOprations(){

    $con = new mysqli('localhost', 'root','' , 'iebook');

        $sql_ads = "SELECT * FROM Ads";
        $result_Ads = $con->query($sql_ads);
        if($result_Ads->num_rows > 0){
        while ($row_Ads = $result_Ads->fetch_assoc()){
            echo '
                <div class="w3-col m2">
                    <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center w3-margin-top" style="width: 240px;height: 630px">
                        <div><img src="Images/'.$row_Ads['Image'].'" alt="advertising" /></div>
                    </div>
                </div>
            ';
            }
        }
        echo '
        
        <!-- Page content -->
        <div class="w3-col m8">
            <div class="w3-container w3-card-2 w3-white w3-round" style="max-width:1050px;margin: 16px 16px 16px 37px;">
        
                <!-- University Section -->
                <div class="w3-container w3-padding-32" style="text-transform: uppercase;" id="University">
                    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">University</h3>
                </div>
                <div class="w3-row-padding" style="margin-left: 5%; margin-bottom: 5%">
        ';

    $sql = "SELECT * FROM university";
    $result = $con->query($sql);
    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
                echo '
                    <div class="w3-col l3 m6 w3-margin-bottom" style="margin: 0 20px 0 20px">
                        <div class="w3-display-container">
                            <div class="w3-display-topleft w3-black w3-padding" style="text-transform: uppercase;">' . $row['Name'] . '</div>
                                 <img src="Images/' . $row['Image'] . '" alt="' . $row['Name'] . '" onclick="window.location.href=\'index.php?pid=Colleges&uni=' . $row['Name'] . '\'" style="margin-left: 20%;cursor: pointer; width:150px;height: 175px">
                            </div>
                        </div>
                ';
        }
    }
echo '
                </div>
            </div>
        </div>
';
    $sql_ads = "SELECT * FROM Ads";
    $result_Ads = $con->query($sql_ads);
    if($result_Ads->num_rows > 0){
        while ($row_Ads = $result_Ads->fetch_assoc()){
            echo '
                <div class="w3-col m2">
                    <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center w3-margin-top" style="width: 240px;height: 630px">
                        <div><img src="Images/'.$row_Ads['Image'].'" alt="advertising" /></div>
                    </div>
                </div>
            ';
        }
    }
    mysqli_close($con);
}


?>