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
    $Name_dep = array();
    for($i = 1; $i<10000; $i++) {
        if (empty($_POST['Name_dep'.$i])){
            break;
        }
        $Name_dep[$i] = $_POST['Name_dep'.$i];
        $count++;
    }

    $result_uni = $con->query("SELECT * FROM university WHERE Name='$name_of_uni'");
    if($result_uni->num_rows > 0){
        while($row = $result_uni->fetch_assoc()){
            $Id_uni = $row['Id'];
        }
    }


    $result_college = $con->query("SELECT * FROM college WHERE Name='$name_of_college'");
    if($result_college->num_rows > 0){
        while($row = $result_college->fetch_assoc()){
            $Id_college = $row['Id'];
        }
    }

    for($i = 1; $i<= $count; $i++) {
        $sql_dep = "INSERT INTO department (Name, College_Id, University_Id) 
            VALUE('$Name_dep[$i]','$Id_college', '$Id_uni')";
        if ($con->query($sql_dep)) {

            echo '<meta http-equiv="refresh" content="0; \'/OY44/ControlPanel.php?CP=Control_University"/>';
        }
    }

}

?>