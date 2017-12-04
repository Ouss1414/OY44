<?php
if (isset($_SESSION['user'])){

$con = new mysqli('localhost','root','','db_iebook_8003115736_v');

if (empty($_GET['user']) || $_SESSION['user'] == $_GET['user']) {
    $Name_User = $_SESSION['user'];
}else {
    $Name_User = $_GET['user'];
}

//User
$sql_User = "SELECT * FROM user WHERE  User_Name = '$Name_User'";
$result_user = $con->query($sql_User);
if ($result_user->num_rows > 0) {
while ($row_User = $result_user->fetch_assoc()) {
    if (empty($row_User['Image'])) {
        $row_User['Image'] = 'defult.png';
    }
    echo '
                <!-- Page Container -->
                <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
                    <!-- The Grid -->
                    <div class="w3-row">
                        <!-- Left Column -->
                        <div class="w3-col m3">
                            <!-- Profile -->
                            <div class="w3-card-2 w3-round w3-white">
                                <div class="w3-container">
                                    <h4 class="w3-center">' . $row_User['First_Name'] . " " . $row_User['Last_Name'] . '</h4>
                                    <p class="w3-center"><img src="Images/Pic/' . $row_User['Image'] . '" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                                    <div class="w3-center">
                                    ';
    if ($row_User['User_Name'] != $Name_User) {
        echo '
                                    <p><button class="w3-btn w3-border" style="min-width: 100px"> FOLLOW </button> 
                                    ';
    }
    echo '
                                    <button class="w3-btn w3-border" style="min-width: 100px"> CV </button></p>
                                    <div class="w3-theme-d3">
                                    <p class="w3-padding"><a class="w3-margin-right" style="min-width: 100px;cursor: pointer" onclick="location.href=\'index.php?pid=Followers&user='.$Name_User.'\'"> Followers </a>
                                    <a  class="w3-margin-left" style="min-width: 100px;cursor: pointer" onclick="location.href=\'index.php?pid=Following&user='.$Name_User.'\'"> Following </a></p>
                                    </div>
                                    </div>
                                    <hr>
                                    <p style="text-transform: uppercase"><i class="fa fa-university fa-fw w3-margin-right w3-text-theme"></i>' . $row_User['University'] . "," . $row_User['Department'] . '</p>
                                    <p style="text-transform: uppercase"><i class="fa fa-Author fa-fw w3-margin-right w3-text-theme"></i> ' . $row_User['Country'] . "," . $row_User['City'] . '</p>
                                    <p style="text-transform: uppercase"><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>' . $row_User['Date_Of_Birth'] . '</p>
                                </div>
                            </div>
                             <br>
                            <!-- Accordion -->
                            <div class="w3-card-2 w3-round">
                                <div class="w3-white">
                                 ';
    if (empty($_GET['user']) || $Name_User == $_SESSION['user']) {
        echo '
                                    <button onclick="location.href=\'index.php?pid=Favorite&user='.$Name_User.'\'" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-heart-o fa-fw w3-margin-right"></i> My Favorite</button>
                                    <button onclick="myFunction(\'Demo1\')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
                                    <div id="Demo1" class="w3-hide w3-container">
                                        <p class="w3-text-red">Coming Soon ...</p>
                                    </div>
                                    <button onclick="myFunction(\'Demo2\')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
                                    <div id="Demo2" class="w3-hide w3-container">
                                        <p class="w3-text-red">Coming Soon ...</p>
                                    </div>
                                    ';
    }
    echo '
                                    <button onclick="myFunction(\'Demo3\')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
                                    <div id="Demo3" class="w3-hide w3-container">
                                        <div class="w3-row-padding">
                                            <br>
                                            <div class="w3-half">
                                                <img src="Images/lights.jpg" style="width:100%" class="w3-margin-bottom">
                                            </div>
                                            <div class="w3-half">
                                                <img src="Images/nature.jpg" style="width:100%" class="w3-margin-bottom">
                                            </div>
                                            <div class="w3-half">
                                                <img src="Images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
                                            </div>
                                            <div class="w3-half">
                                                <img src="Images/forest.jpg" style="width:100%" class="w3-margin-bottom">
                                            </div>
                                            <div class="w3-half">
                                                <img src="Images/nature.jpg" style="width:100%" class="w3-margin-bottom">
                                            </div>
                                            <div class="w3-half">
                                                <img src="Images/fjords.jpg" style="width:100%" class="w3-margin-bottom">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            
                
                            <!-- End Left Column -->
                        </div>
';

    switch ($_GET['pid']){
        case 'Followers':
            Followers();
            break;
        case 'Following':
            Following();
            break;
        case 'Favorite':
            Favorite();
            break;
        default:
            Profile();
            break;
    }

    echo '
                        <!-- Right Column -->
                        <div class="w3-col m2">
                        ';
$count_Following = '0';
$result_followers = $con->query("SELECT * FROM followers WHERE User_Id=$row_User[Id] AND Status='approve'");
if($result_followers->num_rows > 0) {
    echo '

                            <div class="w3-card-2 w3-round w3-white w3-center">
                                <div class="w3-container">
                                    <p>Friends</p>
                ';

        while ($row_followers = $result_followers->fetch_assoc()) {
            $sql_User_F = "SELECT * FROM user WHERE Id=$row_followers[Following]";
            $result_user_F = $con->query($sql_User_F);
            if ($result_user_F->num_rows > 0) {
                while ($row_User_F = $result_user_F->fetch_assoc()) {
                    if ($count_Following <= 1) {
                        if (empty($row_User_F['Image'])) {
                            $row_User_F['Image'] = 'defult.png';
                        }
                        echo '
                        
                                    <a style="cursor: pointer" onclick="location.href=\'index.php?pid=Profile&user=' . $row_User_F['User_Name'] . '\'"><img src="Images/Pic/' . $row_User_F['Image'] . '" width="100px" height="100px" class="w3-circle"></a>
                                    <p>' . $row_User_F['User_Name'] . '</p>
                                    
                ';
                        $count_Following++;
                    } else {
                        break;
                    }
                }
            }
        }

        echo '
                                    <p><button class="w3-button w3-block w3-theme-l4" onclick="location.href=\'index.php?pid=Following&user='.$Name_User.'\'">More</button></p>
                                </div>
                            </div>
                            <br>
                            
                                ';
    }
if (empty($_GET['user'])) {
    $count_Accept = '0';
    $result_followers = $con->query("SELECT * FROM followers WHERE Following=$row_User[Id] AND Status='NULL' OR Status=''");
    if ($result_followers->num_rows > 0) {
        while ($row_followers = $result_followers->fetch_assoc()) {
            $sql_User_F = "SELECT * FROM user WHERE Id=$row_followers[User_Id]";
            $result_user_F = $con->query($sql_User_F);
            if ($result_user_F->num_rows > 0) {
                while ($row_User_F = $result_user_F->fetch_assoc()) {
                    if ($count_Accept < 1) {
                        if (empty($row_User_F['Image'])) {
                            $row_User_F['Image'] = 'defult.png';
                        }
                        echo '
               <div class="w3-card-2 w3-round w3-white w3-center">
                  <div class="w3-container">
                     <p>Friend Request</p>
                     <img src="Images/Pic/' . $row_User_F['Image'] . '" width="100px" height="100px" class="w3-circle"><br>
                     <span>' . $row_User_F['User_Name'] . '</span>
                     <div class="w3-row w3-opacity">
                        <div class="w3-half">
                           <button class="Accept_Follow w3-button w3-block w3-green w3-section" id="' . $row_followers['Id'] . '" title="Accept"><i class="fa fa-check"></i></button>
                        </div>
                        <div class="w3-half">
                           <button class="Reject_Follow w3-button w3-block w3-red w3-section" id="' . $row_followers['Id'] . '" title="Decline"><i class="fa fa-remove"></i></button>
                        </div>
                     </div>
                  </div>
               </div>
               <br>                   ';
                        $count_Accept++;
                    } else {
                        break;
                    }
                }
            }
        }
    }
}
    echo '
                
                            <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
                                <p>ADS</p>
                            </div>
                            <br>
                
                
                            <!-- End Right Column -->
                        </div>
                
                        <!-- End Grid -->
                    </div>
                
                    <!-- End Page Container -->
                </div>
                <br>
                ';
}
}
}else{
    header('Location: http://localhost/OY44/index.php?pid=Login');
}

?>
