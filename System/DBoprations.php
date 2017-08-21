<?php

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
            <a href="index.php?pid=Home">Home</a> -
            <a href="index.php#University" style="text-transform: uppercase"> '.$Name_University.'</a> -
            <a href="index.php?pid=Colleges&uni='.$Name_University.'" style="text-transform: uppercase">College_of_ '.$Name_College.' </a> -
            <a href="index.php?pid=Department&uni='.$Name_University.'&college='.$Name_College.'&dep='.$Name_Department.'" style="text-transform: uppercase"> '.$Name_Department.'</a>
        </div>
        
        <div class="w3-row w3-card-2 w3-margin-top w3-margin-left w3-margin-right w3-padding">
            <a href="index.php?pid=Add_Post&uni='.$Name_University.'&college='.$Name_College.'&dep='.$Name_Department.'" class="w3-button w3-border" style="text-decoration: none">Add Post</a> -
            <select class="w3-theme-2 w3-margin" style="width: 15%">
                <option value="null">Sort --- </option>
                <option value="date">Date</option>
                <option value="name">Name</option>
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
                            <div title="LIKE" class="fa fa-thumbs-up w3-large w3-hover-green w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Like'].' </div>
                            <div title="DISLIKE" class="fa fa-thumbs-down w3-large w3-hover-red w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Dislike'].' </div>
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
                            <div title="LIKE" class="fa fa-thumbs-up w3-large w3-hover-green w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Like'].' </div>
                            <div title="DISLIKE" class="fa fa-thumbs-down w3-large w3-hover-red w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Dislike'].' </div>
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
                                <div title="LIKE" class="fa fa-thumbs-up w3-large w3-hover-green w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Like'].' </div>
                                <div title="DISLIKE" class="fa fa-thumbs-down w3-large w3-hover-red w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Dislike'].' </div>
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