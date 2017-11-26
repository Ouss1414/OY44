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
    $Name_uni = $con->real_escape_string($_POST['Name_uni']);
    $Name_college = array();
    for($i = 1; $i<10000; $i++) {
        if (empty($_POST['Name_college'.$i])){
            break;
        }
        $Name_college[$i] = $_POST['Name_college'.$i];
        $count++;
    }

    $result_uni = $con->query("SELECT * FROM university WHERE Name='$Name_uni'");
    if($result_uni->num_rows > 0 ){
        while ($row_uni = $result_uni->fetch_assoc()){
            $Id_uni = $row_uni['Id'];
        }
    }

    for($i = 1; $i<= $count; $i++) {
        $sql_college = "INSERT INTO college (Name, University_Id) 
            VALUE('$Name_college[$i]', '$Id_uni')";
        if ($con->query($sql_college)) {

            echo '<meta http-equiv="refresh" content="0; \'/OY44/ControlPanel.php?CP=Add_Department&uni='.$Name_uni.'&college='.$Name_college[1].'"/>';
        }
    }

}

?>