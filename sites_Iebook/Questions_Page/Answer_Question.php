<?php
if(isset($_SESSION['user'])) {
    if (isset($_POST['Answer_ques'])) {
        $currect = "0";
        $incurrect = "0";
        $con = new mysqli('localhost', 'root', '', 'db_iebook_8003115736_v');
        $Serial_Book = $_GET['Serial'];
        $count = '';
        echo '
        <div class="w3-padding-32" style="min-height: 70%">
            <center>
                <table class="w3-table" style="width: 80%">
                    <tr>
                        <td class="w3-border w3-light-gray"></td>
                        <td class="w3-border w3-light-gray">Questions</td>
                        <td class="w3-border w3-light-gray">Your Answer</td>
                        <td class="w3-border w3-light-gray">Correct answer</td>
                        <td class="w3-border w3-light-gray">Grade</td>
                    </tr>
            ';
        $sql_ques = "SELECT * FROM exercise WHERE Serial_Book = '$Serial_Book'";
        $result_Ques = $con->query($sql_ques);
        if ($result_Ques->num_rows > 0) {
            while ($row_Ques = $result_Ques->fetch_assoc()) {
                $count++;
                $Id_ques = $row_Ques['Id'];
                $answer = $_POST[$Id_ques];
                echo '
            <tr>
                <td class="w3-border ">' . $count . '</td>
                <td class="w3-border ">' . $row_Ques['Question'] . '</td>
                <td class="w3-border ">'.$answer.'</td>
                <td class="w3-border ">'.$row_Ques['Q_answer'].'</td>
                ';
                if ($answer == $row_Ques['Q_answer']) {
                    echo '
                <td class="w3-border w3-text-green">True</td>
                ';
                    $currect++;
                }else{
                    echo '
                <td class="w3-border w3-text-red">False</td>
                ';
                    $incurrect++;
                }
                echo '
            </tr>
            ';
            }
        }
        echo '
        </table>
        <table class="w3-table w3-margin-top" style="width: 20%">
            <tr>
                <td class="w3-border w3-text-green">Total Correct Answer: </td>
                <td class="w3-border ">'.$currect.'</td>
            </tr>
            <tr>
                <td class="w3-border w3-text-red">Total Incorrect Answer: </td>
                <td class="w3-border ">'.$incurrect.'</td>
            </tr>
        </table>
        
        <input type="button" name="back_show_Book" value="Back To Book" class="w3-margin w3-padding w3-btn w3-red" onclick="location.href=\'index.php?pid=Show_Book&Serial='.$_GET['Serial'].'\'"/> 
        
    </center>
</div>
';
    }
}else {
    header("Location: http://localhost/OY44/index.php?pid=Login&Serial=$_GET[Serial]");
}
?>
