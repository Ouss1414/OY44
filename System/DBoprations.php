<?php


function CollegeOprations($Name_University){

    $con = new mysqli('localhost', 'root','' , 'iebook');

    $sql_University = "SELECT * FROM university WHERE Name = '$Name_University'";
    $result_University = $con->query($sql_University);
    if($result_University->num_rows > 0) {
        while ($row_University = $result_University->fetch_assoc()) {
            $Id_University = $row_University['Id'];
        }
    }
    $sql_College = "SELECT * FROM college WHERE University_Id = $Id_University";
    $result_college = $con->query($sql_College);
    if($result_college->num_rows > 0) {
        while ($row = $result_college->fetch_assoc()) {
             echo '
                <div class="w3-margin-top w3-margin-left w3-padding-small w3-hover-text-gray w3-text-blue">
                    <a href="index.php?pid=Home" style="text-transform: uppercase">Home</a> -
                    <a href="index.php#University" style="text-transform: uppercase">'. $Name_University .'</a> - COLLEGES
                </div>
                
                <!-- Grid -->
                <div class="w3-row-padding w3-margin-bottom w3-margin" id="plans">
                    <div class="w3-third w3-margin-bottom">
                        <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                            <li class="w3-theme-d2 w3-xlarge w3-padding-32">College of Computer Science and Engineering</li>
                            <li class="w3-padding-16"><a href="index.php?pid=Department&uni=taibah&college=Computer_Science_and_Engineering&dep=CS"><b>CS</b></a></li>
                            <li class="w3-padding-16"><a href="index.php?pid=Department&uni=taibah&college=Computer_Science_and_Engineering&dep=IT"><b>IT</b></a></li>
                            <li class="w3-padding-16"><a href="index.php?pid=Department&uni=taibah&college=Computer_Science_and_Engineering&dep=IS"><b>IS</b></a></li>
                            <li class="w3-padding-16"><a href="index.php?pid=Department&uni=taibah&college=Computer_Science_and_Engineering&dep=link_4"><b>link 4</b></a></li>
                            <li class="w3-padding-16"><a href="index.php?pid=Department&uni=taibah&college=Computer_Science_and_Engineering&dep=link_5"><b>link 5</b></a></li>
                            <li class="w3-padding-16"><a href="index.php?pid=Department&uni=taibah&college=Computer_Science_and_Engineering&dep=link_6"><b>link 6</b></a></li>
                        </ul>
                    </div>
                </div>
            ';
        }
    }
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