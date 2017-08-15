<?php


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
                        <div class="w3-row-padding w3-margin-bottom w3-margin" id="plans">
                            <div class="w3-third w3-margin-bottom">
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
    }
    mysqli_close($con);
}

function HomeOprations(){

    $con = new mysqli('localhost', 'root','' , 'iebook');

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
    mysqli_close($con);
}


?>