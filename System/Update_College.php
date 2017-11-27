<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $count = '0';
    $Id_uni = '';
    $Id_college = '';
    $name_of_uni = $con->real_escape_string($_POST['Name_uni']);
    $name_of_college = $con->real_escape_string($_POST['Name_college']);
    $Id_College = $con->real_escape_string($_POST['Id_College']);
    $Name_dep = array();
    $Id_dep = array();
    for($i = 1; $i<10000; $i++) {
        if (empty($_POST['Name_dep'.$i])){
            break;
        }
        $Name_dep[$i] = $_POST['Name_dep'.$i];
        $Id_dep[$i] = $_POST['Id_dep'.$i];
        $count++;
    }

    $result_uni = $con->query("SELECT * FROM university WHERE Name='$name_of_uni'");
    if($result_uni->num_rows > 0){
        while($row = $result_uni->fetch_assoc()){
            $Id_uni = $row['Id'];
        }
    }

    $name_college = '';
    $result_college = $con->query("SELECT * FROM college WHERE Id='$Id_College'");
    if($result_college->num_rows > 0){
        while($row = $result_college->fetch_assoc()){
            $Id_college = $row['Id'];
            if ($name_of_college != $row['Name']){
                $name_college = $row['Name'];
            }
        }
    }

    $sql_college = "UPDATE college set Name='$name_of_college' WHERE Name='$name_college' AND University_Id=$Id_uni";
    $con->query($sql_college);

    for($i = 1; $i<= $count; $i++) {
        $dep_name = array();
        $dep_name = '';
        $result_dep = $con->query("SELECT * FROM department WHERE Id='$Id_dep[$i]'");
        if($result_dep->num_rows > 0){
            while($row = $result_dep->fetch_assoc()){
                $dep_name[$i] = $row['Name'];
            }
        }
        $sql_dep = "UPDATE department set Name='$Name_dep[$i]' WHERE Name='$dep_name[$i]' AND College_Id=$Id_college AND University_Id=$Id_uni";
        if ($con->query($sql_dep)) {
            echo '<meta http-equiv="refresh" content="0; \'/OY44/ControlPanel.php?CP=Update_College&uni='.$name_of_uni.'&college='.$name_of_college.'"/>';
        }
    }

}

?>