<?php

function Edit_Exercise(){
    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    $UserName = $_SESSION['user'];
    $Id_Exercise = $_GET['Serial'];

    $sql_user = "SELECT * FROM user WHERE User_Name= '$UserName'";
    $result_user = $con->query($sql_user);
    if($result_user->num_rows > 0) {
        while ($row_user = $result_user->fetch_assoc()) {
            $user_Id = $row_user['Id'];
            $sql_exercise = "SELECT * FROM exercise WHERE User_Id='$user_Id' AND Id='$Id_Exercise'";
            $result_exercise = $con->query($sql_exercise);
            if ($result_exercise->num_rows > 0) {
                while ($row_exercise = $result_exercise->fetch_assoc()) {
                    $Q_Answer_1 = '';
                    $Q_Answer_2 = '';
                    $Q_Answer_3 = '';
                    $Q_Answer_4 = '';
                    if($row_exercise['Q_answer'] == $row_exercise['Answer_1']){
                        $Q_Answer_1 = 'checked';
                    }else if($row_exercise['Q_answer'] == $row_exercise['Answer_2']){
                        $Q_Answer_2 = 'checked';
                    }else if($row_exercise['Q_answer'] == $row_exercise['Answer_3']){
                        $Q_Answer_3 = 'checked';
                    }else if($row_exercise['Q_answer'] == $row_exercise['Answer_4']){
                        $Q_Answer_4 = 'checked';
                    }
                    echo'
            <table class="table" style="max-width: 70%">
        <tr>
            <td><label for="Num_Question">Question number: </label></td>
            <td><input type="number" class="form-control" name="Num_Question" id="Num_Question" value="'.$row_exercise['Number_Q'].'" style="max-width: 50%" autofocus required></td>
        </tr>

        <tr>
            <td><label for="Question">Question: </label></td>
            <td><input type="text" class="form-control" name="Question" id="Question" value="'.$row_exercise['Question'].'" required></td>
        </tr>

        <tr>
            <td><label for="Answer_1">Answer 1: </label></td>
            <td>
                <input type="text" class="form-control" name="Answer_1" id="Answer_1" value="'.$row_exercise['Answer_1'].'" style="max-width: 70%; display: inline;margin-right: 5px" required>
                <label><input type="radio" name="Q_Answer" class="Q_Answer" value="1" '.$Q_Answer_1.' required> Correct answer!</label>
            </td>
        </tr>

        <tr>
            <td><label for="Answer_2">Answer 2: </label></td>
            <td>
                <input type="text" class="form-control" name="Answer_2" id="Answer_2" value="'.$row_exercise['Answer_2'].'" style="max-width: 70%; display: inline;margin-right: 5px" required>
                <label><input type="radio" name="Q_Answer" class="Q_Answer" value="2" '.$Q_Answer_2.' required> Correct answer!</label>
            </td>
        </tr>

        <tr>
            <td><label for="Answer_3">Answer 3: </label></td>
            <td>
                <input type="text" class="form-control" name="Answer_3" id="Answer_3" value="'.$row_exercise['Answer_3'].'" style="max-width: 70%; display: inline;margin-right: 5px" required>
                <label><input type="radio" name="Q_Answer" class="Q_Answer" value="3" '.$Q_Answer_3.' required> Correct answer!</label>
            </td>
        </tr>

        <tr>
            <td><label for="Answer_4">Answer 4: </label></td>
            <td>
                <input type="text" class="form-control" name="Answer_4" id="Answer_4" value="'.$row_exercise['Answer_4'].'" style="max-width: 70%; display: inline;margin-right: 5px" required>
                <label><input type="radio" name="Q_Answer" class="Q_Answer" value="4" '.$Q_Answer_4.' required> Correct answer!</label>

            </td>
        </tr>

    </table>

    ';
                }
            }
        }
    }

}

function Get_Exercise(){
    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    $UserName = $_SESSION['user'];
    $count = '';
    $sql_user = "SELECT * FROM user WHERE User_Name= '$UserName'";
    $result_user = $con->query($sql_user);
    if($result_user->num_rows > 0){
        while ($row_user = $result_user->fetch_assoc()){
            $user_Id = $row_user['Id'];
            $sql_exercise = "SELECT * FROM exercise WHERE User_Id='$user_Id'";
            $result_exercise = $con->query($sql_exercise);
            if($result_exercise->num_rows > 0){
                while ($row_exercise = $result_exercise->fetch_assoc()){
                    $count++;
                    echo '
                        <tr>
                            <td style="padding: 5px">'.$count.'</td>
                            <td style="padding: 10px">'.substr($row_exercise['Question'],0,55).'</td>
                            <td style="padding: 10px">'.$row_exercise['Number_Q'].'</td>
                            <td style="padding: 10px">'.$row_exercise['Answer_1'].'</td>
                            <td style="padding: 10px">'.$row_exercise['Answer_2'].'</td>
                            <td style="padding: 10px">'.$row_exercise['Answer_3'].'</td>
                            <td style="padding: 10px">'.$row_exercise['Answer_4'].'</td>
                            <td style="padding: 10px">'.$row_exercise['Q_answer'].'</td>
                            <td style="padding: 10px"><input type="button" name="Edit" value="Edit" class="btn" onclick="location.href=\'ControlPanel.php?CP=Edit_Exercise&Serial='.$row_exercise['Id'].'\'"></td>
                            <td style="padding: 10px"><input type="button" class="delete_exercise btn btn-red" name="'.$row_exercise['Question'].'" id="'.$row_exercise['Id'].'" value="Delete"></td>
                        </tr>
                    ';
                }
            }
        }
    }

}

function Get_Id_book(){
    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

        echo '
            <tr>
                <td><label for="books">Choose book: </label></td>
                <td>
                    <select class="form-control" id="books" onchange="Id_Book()" required>
                        <option>choose book...</option>
        ';

        $sql_book = "SELECT * FROM book";
        $result_book = $con->query($sql_book);
        if ($result_book->num_rows > 0){
            while ($row_book = $result_book->fetch_assoc()){
                $select = "";
                if ($_GET['Serial'] == $row_book['Serial']){
                    $select = "selected";
                }
                echo '
                    <option '.$select.' value="'.$row_book['Serial'].'">'.$row_book['Name_Book'].'</option>
                    ';
            }
        }

        echo '
                    </select>
                </td>
            </tr>
        ';
}

function Get_Books(){
    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    $UserName = $_SESSION['user'];
    $count = '';
    $sql_user = "SELECT * FROM user WHERE User_Name= '$UserName'";
    $result_user = $con->query($sql_user);
    if($result_user->num_rows > 0){
        while ($row_user = $result_user->fetch_assoc()){
            $user_Id = $row_user['Id'];
            $sql_book = "SELECT * FROM book WHERE User_Id='$user_Id'";
            $result_book = $con->query($sql_book);
            if($result_book->num_rows > 0){
                while ($row_book = $result_book->fetch_assoc()){
                    $count++;
                    echo '
                        <tr>
                            <td style="padding: 5px">'.$count.'</td>
                            <td style="padding: 10px">'.$row_book['Serial'].'</td>
                            <td style="padding: 10px">'.$row_book['Name_Book'].'</td>
                            <td style="padding: 10px">'.$row_book['Price'].'</td>
                            <td style="padding: 10px"><input type="button" name="add_exercise" value="Add Exercise" class="btn" onclick="location.href=\'ControlPanel.php?CP=Add_Exercise&Serial='.$row_book['Serial'].'\'"></td>
                            <td style="padding: 10px"><input type="button" name="Edit" value="Edit" class="btn" onclick="location.href=\'ControlPanel.php?CP=Edit_Book&Serial='.$row_book['Serial'].'\'"></td>
                            <td style="padding: 10px"><input type="button" class="delete_data btn btn-red" name="'.$row_book['Name_Book'].'" id="'.$row_book['Serial'].'" value="Delete"></td>
                        </tr>
                    ';
                }
            }
        }
    }

}

function Questions_Page(){
    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');


    $Serial_Book = $_GET['Serial'];
    $this_page = $_GET['pid'];

    $sql_check = "SELECT * FROM book WHERE Serial='$Serial_Book'";
    $result_check = $con->query($sql_check);
    if ($result_check->num_rows > 0){
        while ($row_check = $result_check->fetch_assoc()){
            echo '
                <div class="w3-margin-top w3-margin-left w3-padding-small w3-hover-text-gray w3-text-blue">
                    <a href="index.php?pid=IEBook#IEBook" style="text-transform: uppercase">IEBook</a> -
                    <a href="index.php?pid=Show_Book&Serial='.$Serial_Book.'" style="text-transform: uppercase">'.$row_check['Name_Book'].'</a> -
                    <a href="" style="text-transform: uppercase">'.$this_page.'</a> 
                    
                </div>
            ';

    $count = '';
    echo '
<div class="w3-padding-32" style="min-height: 70%">
    <center>
        <form action="index.php?pid=Answer_Question&Serial='.$Serial_Book.'" method="post" role="form">
    ';
    $sql_ques = "SELECT * FROM exercise WHERE Serial_Book = '$Serial_Book'";
    $result_Ques = $con->query($sql_ques);
    if($result_Ques->num_rows > 0){
        while ($row_Ques = $result_Ques->fetch_assoc()) {
            $count++;
            echo '
        <table class="w3-table" style="width: 80%">
            <tr>
                <input type="text" name="Id_Question" value="'.$row_Ques['Id'].'" style="display: none">
                <td class="w3-border w3-light-gray"><i class="w3-text-red">Questions '.$count.' :</i> '.$row_Ques['Question'].'</td>
            </tr>
        </table>
        <table class="w3-table" style="width: 80%">
            <tr>
                <td class="w3-border w3-light-gray"><label><input type="radio" name="'.$row_Ques['Id'].'" value="'.$row_Ques['Answer_1'].'" required> '.$row_Ques['Answer_1'].'</label></td>
                <td class="w3-border w3-light-gray"><label><input type="radio" name="'.$row_Ques['Id'].'" value="'.$row_Ques['Answer_2'].'" required> '.$row_Ques['Answer_2'].'</label></td>
                <td class="w3-border w3-light-gray"><label><input type="radio" name="'.$row_Ques['Id'].'" value="'.$row_Ques['Answer_3'].'" required> '.$row_Ques['Answer_3'].'</label></td>
                <td class="w3-border w3-light-gray"><label><input type="radio" name="'.$row_Ques['Id'].'" value="'.$row_Ques['Answer_4'].'" required> '.$row_Ques['Answer_4'].'</label></td>
            </tr>
        </table>
        <br>
        ';
        }
        echo '
        <input type="submit" name="Answer_ques" value="Answer" class="w3-margin-right w3-padding w3-btn w3-border-gray w3-gray">
            <input type="reset" value="Reset" class="w3-margin-left w3-padding w3-btn w3-border-red w3-red">
        </form>
        ';
    }else {
        echo '<div style="margin-top: 10%">
                      <p class="w3-xxxlarge w3-text-red">There is no question for this book</p>
                  </div>';
    }
        }
    }else {
        echo '<div style="margin-top: 10%">
                      <p class="w3-xxxlarge w3-text-red">There is no book like Serial ['.$_GET['Serial'].']</p>
                  </div>';
    }
    echo '
            
    </center>
</div>
    ';

}

function Show_Book(){

    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    $Serial_Book = $_GET['Serial'];
    if(empty($Serial_Book)){
        echo '<script>location.href="http://localhost/OY44/index.php?pid=IEBook"</script>
              <div class="w3-row">
             ';
    }

    $result = $con->query("SELECT * FROM book,user WHERE User_Id=Id AND Serial='$Serial_Book'");
    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
                <div class="w3-margin-top w3-margin-left w3-padding-small w3-hover-text-gray w3-text-blue">
                    <a href="index.php?pid=IEBook#IEBook" style="text-transform: uppercase">IEBook</a> -
                    <a href="" style="text-transform: uppercase">'.$row['Name_Book'].'</a>
                </div>
            ';

            echo '
                <embed class="w3-right" style="margin-top:10px; margin-right:10px;" src="Upload_Books/' . $row["Location"] . '" width="800px" height="600px"></embed>
            </div>
        <div class="w3-row m5">
        
            <div class="Exam_btn w3-col s1">
                <button class="w3-btn" name="exam" value="exam" onclick="location.href=\'index.php?pid=Questions_Page&Serial='.$_GET['Serial'].' \'">Answer Questions</button>
            </div>
            ';
            if (empty($row['Image'])) {
                $row['Image'] = 'defult.png';
            }
                echo '
            <div class="img_auther w3-col s2">
                 <img src="Images/Pic/' . $row['Image'] . '" width="50px" height="50px">
            </div>
            
            <div class="rating w3-col s3 w3-right">
                <p style="margin-left: 30px">'.$row['First_Name'] ." ".$row['Last_Name'].'</p>
                    <ul class="rating-stars" style="display: flex;list-style-type: none;">
                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                        <li style="margin-left: 7px;"><i class="fa fa-star-half-o"></i></li>
                    </ul>
            </div>
        </div>
    ';
        }
    }
}

function Catagories(){

    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    if(empty($_GET['List'])){
        $_GET['List'] = 'All';
    }
    echo'
        <ul>
            <li id="All" onclick="location.href=\'http://localhost/OY44/index.php?pid=IEBook&List=All#IEBook\'"><a>ALL</a></li>
            ';
    if ($_GET['List'] == 'All' ){
        echo "
             <script>
             document.getElementById('All').style.background = '#4D636F';
             document.getElementById('All').style.color = 'white';
             </script>
             ";
    }

    //list
    $sql_list = "SELECT distinct Catagories FROM book";
    $result_list = $con->query($sql_list);
    if ($result_list->num_rows > 0) {
        while ($row_list = $result_list->fetch_assoc()) {

            echo '
                  <hr>
                  <li id="'.$row_list['Catagories'].'" onclick="location.href=\'http://localhost/OY44/index.php?pid=IEBook&List=' . $row_list['Catagories'] . '#IEBook\'"><a>' . $row_list['Catagories'] . '</a></li>
                ';
            if ($_GET['List'] == $row_list['Catagories'] ){
                echo "
                     <script>
                     document.getElementById('".$row_list['Catagories']."').style.background = '#4D636F';
                     document.getElementById('".$row_list['Catagories']."').style.color = 'white';
                     </script>
                    ";
            }
        }

    }

        echo '
                </ul>
             ';
}

function List_Books()
{
    if (empty($_GET['page'])) {
        $_GET['page'] = '1';
    }

    echo '
            <div class="Book w3-col s9">
                <ul>
            ';
    $con = new mysqli('localhost', 'root', '', 'db_iebook_8003115736_v');
    $results_per_page = 6;

    isset($_GET['page']) ? $page = $_GET['page'] : $page = 0;

    if ($page > 1) {
        $this_page_first_result = ($page * $results_per_page) - $results_per_page;
    } else {
        $this_page_first_result = 0;
    }

    $lisst = $_GET['List'];

    switch ($lisst) {
        case "All" :
            $sql = "SELECT * FROM book";
            break;
        default :
            $sql = "SELECT Catagories FROM book WHERE Catagories='$lisst'";
    }

    //Books
    $result_book = $con->query($sql);
    $number_of_results = $result_book->num_rows;

    $totalPages = $number_of_results / $results_per_page;

    switch ($lisst) {
        case "All" :
            $sql = "SELECT * FROM book,user WHERE User_Id=Id AND Available='1' LIMIT $this_page_first_result, $results_per_page";
            break;
        default :
            $sql = "SELECT * FROM book,user WHERE User_Id=Id AND Available='1' AND Catagories='$lisst' LIMIT $this_page_first_result, $results_per_page";
    }

    $result_book = $con->query($sql);
    if ($result_book->num_rows > 0) {
        while ($row_book = $result_book->fetch_assoc()) {
            echo '
                    <div class="w3-container w3-card w3-padding-small w3-margin w3-col s3">
                                    <li>
                                        <div class="s-product" style="width:155px;">
                                            <div class="s-product-img">
                                                <img src="Upload_Books/' . $row_book['Image_Book'] . '" alt="" width="100%" height="217">
                                                <div class="s-product-hover">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                        <li><a href="index.php?pid=Show_Book&Serial='.$row_book['Serial'].'"><i class="fa fa-book"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="s-product-tooltip">
                                                    <ul class="book-detail-list" style="margin-left: -40px; margin-bottom: -20px">
                                                        <li style="display: inline;">' . $row_book['Name_Book'] . '</li><li style="display: inline; color:darkgray;"> |  Price: <span>$</span>' . $row_book['Price'] . '</li>
                                                        <li>Writed by : <span class="theme-color">' . $row_book['First_Name'] . " " . $row_book['Last_Name'] . '</span></li>
                                                        <li>Pages : <span>' . $row_book['Page'] . '</span></li>
                                                    </ul>
                                                    <p>Summary : <span>' . $row_book['Summary'] . '</span></p>
                                                    <ul class="rating-stars" style="display: flex">
                                                        <li><span>Rating: </span> </li>
                                                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                                                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                                                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                                                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                                                        <li style="margin-left: 7px;"><i class="fa fa-star-half-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h6><a href="">' . $row_book['Name_Book'] . '</a></h6>
                                            <span>' . $row_book['First_Name'] . " " . $row_book['Last_Name'] . '</span>
                                        </div>
                                    </li>
                                </div>
    ';
        }
    }

    echo '
            </ul>
        </div>
        <div class="div_page">
    ';

    // display the links to the pages
    if ($lisst != 'All') {
        $totalPages++;
    }

    if ($page > 1) {
        print '<a style="margin: 2px;" id="Previous" class="page" href="index.php?pid=IEBook&List=' . $_GET['List'] . '&page=' . $page = $page - 1 . '#IEBook">Prev</a>';
    }

    for ($page = 1; $page <= $totalPages; $page++) {
        print '<a style="margin: 2px;" id="' . $page . '" class="page" href="index.php?pid=IEBook&List=' . $_GET['List'] . '&page=' . $page . '#IEBook">' . $page . '</a>';
    }

    $next = $_GET['page'] + 1;
    $page--;
    if ($_GET['page'] != $page) {
        print '<a style="margin: 2px;" id="Next" class="page" href="index.php?pid=IEBook&List=' . $_GET['List'] . '&page=' . $next . '#IEBook">Next</a>';
    }

    echo "
        </div>
          <script>
              document.getElementById('".$_GET['page']."').style.background = '#4D636F';
              document.getElementById('".$_GET['page']."').style.color = 'white';
          </script>
         ";
}

function Profile(){

    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    $Name_User = $_SESSION['user'];

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
                                    <h4 class="w3-center">'.$row_User['First_Name'] . " " . $row_User['Last_Name'] .'</h4>
                                    <p class="w3-center"><img src="Images/Pic/'.$row_User['Image'].'" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                                    <div class="w3-center"><p><button class="w3-btn w3-border" style="min-width: 100px"> FOLLOW </button> <button class="w3-btn w3-border" style="min-width: 100px"> CV </button></p></div>
                                    <hr>
                                    <p style="text-transform: uppercase"><i class="fa fa-university fa-fw w3-margin-right w3-text-theme"></i>'.$row_User['University']. "," . $row_User['Department'] .'</p>
                                    <p style="text-transform: uppercase"><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> '.$row_User['Country'] . "," . $row_User['City'] .'</p>
                                    <p style="text-transform: uppercase"><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>'.$row_User['Date_Of_Birth'].'</p>
                                </div>
                            </div>
                             <br>
                
                            <!-- Accordion -->
                            <div class="w3-card-2 w3-round">
                                <div class="w3-white">
                                    <button onclick="myFunction(\'Demo1\')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
                                    <div id="Demo1" class="w3-hide w3-container">
                                        <p class="w3-text-red">Coming Soon ...</p>
                                    </div>
                                    <button onclick="myFunction(\'Demo2\')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
                                    <div id="Demo2" class="w3-hide w3-container">
                                        <p class="w3-text-red">Coming Soon ...</p>
                                    </div>
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
                             <!-- Interests -->
                            <div class="w3-card-2 w3-round w3-white w3-hide-small">
                                <div class="w3-container">
                                    <p>Interests</p>
                                    <p>
                                        <span class="w3-tag w3-small w3-theme-d5">News</span>
                                        <span class="w3-tag w3-small w3-theme-d4">W3Schools</span>
                                        <span class="w3-tag w3-small w3-theme-d3">Labels</span>
                                        <span class="w3-tag w3-small w3-theme-d2">Games</span>
                                        <span class="w3-tag w3-small w3-theme-d1">Friends</span>
                                        <span class="w3-tag w3-small w3-theme">Games</span>
                                        <span class="w3-tag w3-small w3-theme-l1">Friends</span>
                                        <span class="w3-tag w3-small w3-theme-l2">Food</span>
                                        <span class="w3-tag w3-small w3-theme-l3">Design</span>
                                        <span class="w3-tag w3-small w3-theme-l4">Art</span>
                                        <span class="w3-tag w3-small w3-theme-l5">Photos</span>
                                    </p>
                                </div>
                            </div>
                            <br>
                
                            <!-- Alert Box -->
                            <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
                        <span onclick="this.parentElement.style.display=\'none\'" class="w3-button w3-theme-l3 w3-display-topright">
                          <i class="fa fa-remove"></i>
                        </span>
                                <p><strong>Hey!</strong></p>
                                <p>People are looking at your profile. Find out who.</p>
                            </div>
                
                            <!-- End Left Column -->
                        </div>
                ';

            $user_id = $row_User['Id'];
            $user_name = $row_User['User_Name'];

                echo '
                        <!-- Middle Column -->
                        <div class="w3-col m7">
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                    <div class="w3-card-2 w3-round w3-white">
                                        <div class="w3-container w3-padding">
                                            <p><input type="text" id="Add_Post" class="w3-border w3-padding" placeholder="Express what is inside you ..." style="width: 100%;"></p>
                                            <button type="reset" class="button_add_post w3-button w3-theme" id="'.$user_id.'"><i class="fa fa-pencil"></i>  Post</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                ';

            //Post_Profile
            $sql_Post_Profile = "SELECT * FROM post WHERE  User_Id = '$user_id' ORDER BY Date_Post DESC ";
            $result_Post_Profile = $con->query($sql_Post_Profile);
            if ($result_Post_Profile->num_rows > 0) {
                while ($row_Post_Profile = $result_Post_Profile->fetch_assoc()) {
                    echo '
                            <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
                                <img src="Images/pic/' . $row_User['Image'] . '" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px;height: 55px">
                                <span class="w3-right w3-opacity"> ' . $row_Post_Profile['Date_Post'] . ' </span>
                                ';
                    if(!empty($row_Post_Profile['Subject'])) {
                        echo '
                                <span class="w3-right w3-opacity w3-text-red w3-margin-right"> This post from university part </span>
                                ';
                    }
                        echo '
                                <h4>' . $row_User['First_Name'] . " " . $row_User['Last_Name'] . '</h4><br>
                                <hr class="w3-clear">
                                ';
                    if(!empty($row_Post_Profile['Subject'])) {
                        echo '
                                <p class="w3-xlarge">Subject: ' . $row_Post_Profile['Subject'] . '</p>
                                ';
                    }
                    echo '
                                <p class="Post-Prof" id="' . $row_Post_Profile['Message'] . '">' . $row_Post_Profile['Message'] . '.</p>
                  ';
                    if (!empty($row_Post_Profile['Image'])){
                        echo '
                                <div class="w3-row-padding" style="margin:0 -16px">
                                    <div class="w3-half">
                                        <img src="Images/'.$result_Post_Profile['Image'].'" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
                                    </div>
                                    <div class="w3-half">
                                        <img src="Images/'.$result_Post_Profile['Image'].'" style="width:100%" alt="Nature" class="w3-margin-bottom">
                                    </div>
                                </div>
                                ';
                    }
                                echo '
                                <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  '. $row_Post_Profile['Like'] .'</button>
                                <button type="button" class="w3-button w3-margin-bottom w3-red"><i class="fa fa-thumbs-down"></i>  '. $row_Post_Profile ['Dislike'].'</button>
                                ';
                                if($_SESSION['user'] = $user_name) {
                                    echo '
                            <div class="delete_data w3-padding fa fa-trash w3-btn w3-red right" style="margin-bottom: 5px" name="'.$row_Post_Profile['Message'].'" id="'.$row_Post_Profile['Id'].'" value="pid=Profile"></div>
                        ';
                                }
                echo '
                  </div>
                ';
                }
            }
//                            <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
//                                <img src="Images/Icons/avatar5.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
//                                <span class="w3-right w3-opacity">16 min</span>
//                                <h4>Jane Doe</h4><br>
//                                <hr class="w3-clear">
//                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
//                                <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
//                                <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
//                            </div>
//
//                            <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
//                                <img src="Images/Icons/avatar6.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
//                                <span class="w3-right w3-opacity">32 min</span>
//                                <h4>Angie Jane</h4><br>
//                                <hr class="w3-clear">
//                                <p>Have you seen this?</p>
//                                <img src="Images/nature.jpg" style="width:100%" class="w3-margin-bottom">
//                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
//                                <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
//                                <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
//                            </div>
                echo '
                            <!-- End Middle Column -->
                        </div>
                ';

                echo '
                        <!-- Right Column -->
                        <div class="w3-col m2">
                            <div class="w3-card-2 w3-round w3-white w3-center">
                                <div class="w3-container">
                                    <p>Upcoming Events:</p>
                                    <img src="Images/forest.jpg" alt="Forest" style="width:100%;">
                                    <p><strong>Holiday</strong></p>
                                    <p>Friday 15:00</p>
                                    <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
                                </div>
                            </div>
                            <br>
                
                            <div class="w3-card-2 w3-round w3-white w3-center">
                                <div class="w3-container">
                                    <p>Friend Request</p>
                                    <img src="Images/Icons/avatar6.png" alt="Avatar" style="width:50%"><br>
                                    <span>Jane Doe</span>
                                    <div class="w3-row w3-opacity">
                                        <div class="w3-half">
                                            <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
                                        </div>
                                        <div class="w3-half">
                                            <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                
                            <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
                                <p>ADS</p>
                            </div>
                            <br>
                
                            <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
                                <p><i class="fa fa-bug w3-xxlarge"></i></p>
                            </div>
                
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
}

function getPic(){
    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');
    $Name_User = $_SESSION['user'];

    //User
    $sql_User = "SELECT Image FROM user WHERE  User_Name = '$Name_User'";
    $result_user = $con->query($sql_User);
    if ($result_user->num_rows > 0) {
        while ($row_User = $result_user->fetch_assoc()) {
                if (empty($row_User['Image'])) {
                    $row_User['Image'] = 'defult.png';
                }
            echo '
                <a href="../../index.php?pid=Profile" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><img src="../../Images/Pic/'.$row_User['Image'].'" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a> 
                ';
        }
    }
}

function Edit_Profile(){

    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    $Name_User = $_SESSION['user'];

    //User
    $sql_User = "SELECT * FROM user WHERE  User_Name = '$Name_User'";
    $result_user = $con->query($sql_User);
    if ($result_user->num_rows > 0) {
        while ($row_User = $result_user->fetch_assoc()) {
                if (empty($row_User['Image'])) {
                    $row_User['Image'] = 'defult.png';
                }
      echo '
        <div class="w3-row" style="padding: 20px;  margin-left: 10%; margin-right: 10%">

                    <!-- edit form column -->
           <form id="Edit-Profile-form" method="post" action="Edit_Profile_Proccess.php" enctype="multipart/form-data">
                    <!-- left column -->
                    <div class="w3-row m3 w3-margin-bottom">
                        <div class="w3-center">
                        <label>
                            <img src="../../Images/Pic/'.$row_User['Image'].'" class="w3-circle" alt="avatar" style="width: 100px;height: 100px">
                            <input type="file" name="photo" title="upload photo" style="margin-top: 15px; margin-bottom: 15px" accept="image/*">
                        </label>
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
                            <optgroup label="Choose Country ---">
                                <option value="Soudi Arabia">Soudi Arabia</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <select class="form-control" name="city">
                            <option value="'.$row_User['City'].'">'.$row_User['City'].'</option>
                            <optgroup label="Choose City ---" style="width: 200px">
                                <option value="Madinah">Madinah</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <select class="form-control" name="university">
                            <option value="'.$row_User['University'].'">'.$row_User['University'].'</option>
                            <optgroup label="Choose University ---">
                                <option value="Taibah University">Taibah University</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <select class="form-control" name="college">
                            <option value="'.$row_User['College'].'">'.$row_User['College'].'</option>
                            <optgroup label="Choose College ---">
                                <option value="College Of Computer Science and Engineering">College Of Computer Science and Engineering</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <select class="form-control" name="department">
                            <option value="'.$row_User['Department'].'">'.$row_User['Department'].'</option>
                            <optgroup label="Choose Department ---">
                                <option value="CS">CS</option>
                            </optgroup>
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

    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

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
                            if($row_User['User_Type'] == 'dean' || $row_User['User_Type'] == 'doctor' ){
                            $Name_User = 'D.' . $row_User['User_Name'];
                            $Name_User2 = $row_User['User_Name'];
                            }else{
                                $Name_User = $row_User['User_Name'];
                                $Name_User2 = $row_User['User_Name'];
                            }
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
                                ';
                    if($_SESSION['user'] == $Name_User2) {
                        echo '
                            <div class="delete_data w3-padding fa fa-trash w3-btn w3-red" style="margin-bottom: 5px" name="'.$row_Post['Subject'].'" id="'.$row_Post['Id'].'" value="pid=Department&uni='.$_GET['uni'].'&college='.$_GET['college'].'&dep='.$_GET['dep'].'"></div>
                        ';
                    }
                    echo '
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

    $con = new mysqli('localhost', 'root','' , 'db_iebook_8003115736_v');

    $uni = $_GET['uni'];
    $college = $_GET['college'];
    $dep = $_GET['dep'];

    if (empty($_GET['Sort'])){
        $Sort = 'ORDER BY Date_Post DESC';
        $select = '';
        $select_new_post = '';
        $select_old_post = '';
        $select_subject_A_Z = '';
        $select_subject_Z_A = '';
    }else if ($_GET['Sort'] == 'new_post'){
        $Sort = 'ORDER BY Date_Post DESC';
        $select_new_post = 'selected';
        $select_old_post = '';
        $select_subject_A_Z = '';
        $select_subject_Z_A = '';
        $select = '';
    }else if ($_GET['Sort'] == 'old_post'){
        $Sort = 'ORDER BY Date_Post ASC';
        $select_old_post = 'selected';
        $select_new_post = '';
        $select_subject_A_Z = '';
        $select_subject_Z_A = '';
        $select = '';
    }else if ($_GET['Sort'] == 'subject-(A-Z)'){
        $Sort = 'ORDER BY Subject ASC';
        $select_subject_A_Z = 'selected';
        $select_subject_Z_A = '';
        $select_new_post = '';
        $select_old_post = '';
        $select = '';
    }else if ($_GET['Sort'] == 'subject-(Z-A)'){
        $Sort = 'ORDER BY Subject DESC';
        $select_subject_Z_A = 'selected';
        $select_subject_A_Z = '';
        $select_new_post = '';
        $select_old_post = '';
        $select = '';
    }else {
        $Sort = 'ORDER BY Date_Post DESC';
        $select_new_post = '';
        $select_old_post = '';
        $select_subject_A_Z = '';
        $select_subject_Z_A = '';
        $select = '';
    }

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
            <select name="list" id="list" class="w3-theme-2 w3-margin-right" style="width: 15%">
                <option '.$select.' value="index.php?pid=Department&uni='.$uni.'&college='.$college.'&dep='.$dep.'">sort by...</option>
                <option '.$select_new_post.' value="index.php?pid=Department&uni='.$uni.'&college='.$college.'&dep='.$dep.'&Sort=new_post">new post</option>
                <option '.$select_old_post.' value="index.php?pid=Department&uni='.$uni.'&college='.$college.'&dep='.$dep.'&Sort=old_post">old post</option>
                <option '.$select_subject_A_Z.' value="index.php?pid=Department&uni='.$uni.'&college='.$college.'&dep='.$dep.'&Sort=subject-(A-Z)">subject-(A-Z)</option>
                <option '.$select_subject_Z_A.' value="index.php?pid=Department&uni='.$uni.'&college='.$college.'&dep='.$dep.'&Sort=subject-(Z-A)">subject-(Z-A)</option>
                <input type=button value=" Sort " class="w3-btn w3-border" onclick="window.location = document.getElementById(\'list\').value" style="padding-left: 2%; padding-right: 2%"/>
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
            $sql_Post_User = "SELECT * FROM post WHERE Department_Id = $Id_Department $Sort";
            $result_Post = $con->query($sql_Post_User);
            if($result_Post->num_rows > 0) {
                while ($row_Post = $result_Post->fetch_assoc()) {

                    //Dean
                    $sql_User = "SELECT * FROM user WHERE  Id = $row_Post[User_Id] AND User_Type = 'dean'";
                    $result_user = $con->query($sql_User);
                    if ($result_user->num_rows > 0) {
                        while ($row_User = $result_user->fetch_assoc()) {
                            $Name_User = 'D.' . $row_User['User_Name'];
                            $Name_User2 = $row_User['User_Name'];
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
                            ';
                    if($_SESSION['user'] == $Name_User2) {
                        echo '
                            <div class="delete_data w3-padding fa fa-trash w3-btn w3-red" style="margin-bottom: 5px" name="'.$row_Post['Subject'].'" id="'.$row_Post['Id'].'" value="pid=Department&uni='.$_GET['uni'].'&college='.$_GET['college'].'&dep='.$_GET['dep'].'"></div>
                        ';
                    }
                    echo '
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
            $sql_Post_User = "SELECT * FROM post WHERE Department_Id = $Id_Department $Sort";
            $result_Post = $con->query($sql_Post_User);
            if($result_Post->num_rows > 0) {
                while ($row_Post = $result_Post->fetch_assoc()) {

                    //Doctor
                    $sql_User = "SELECT * FROM user WHERE  Id = $row_Post[User_Id] AND User_Type = 'doctor'";
                    $result_user = $con->query($sql_User);
                    if ($result_user->num_rows > 0) {
                        while ($row_User = $result_user->fetch_assoc()) {
                            $Name_User = 'D.' . $row_User['User_Name'];
                            $Name_User2 = $row_User['User_Name'];
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
                            ';
                    if($_SESSION['user'] == $Name_User2) {
                        echo '
                            <div class="delete_data w3-padding fa fa-trash w3-btn w3-red" style="margin-bottom: 5px" name="'.$row_Post['Subject'].'" id="'.$row_Post['Id'].'" value="pid=Department&uni='.$_GET['uni'].'&college='.$_GET['college'].'&dep='.$_GET['dep'].'"></div>
                        ';
                    }
                    echo '
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
        $sql_Post_User = "SELECT * FROM post WHERE Department_Id = $Id_Department $Sort";
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
                                ';
                if ($_SESSION['user'] == $Name_User) {
                    echo '
                                <div class="delete_data w3-padding fa fa-trash w3-btn w3-red" style="margin-bottom: 5px" name="'.$row_Post['Subject'].'" id="'.$row_Post['Id'].'" value="pid=Department&uni='.$_GET['uni'].'&college='.$_GET['college'].'&dep='.$_GET['dep'].'"></div>
                            ';
                }
                echo '
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

    $con = new mysqli('localhost', 'root','' , 'db_iebook_8003115736_v');

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

    if (empty($_GET['page'])) {
        $_GET['page'] = '1';
    }

    $con = new mysqli('localhost', 'root','' , 'db_iebook_8003115736_v');

    $results_per_page = 6;

    isset($_GET['page']) ? $page = $_GET['page'] : $page = 0;

    if ($page > 1) {
        $this_page_first_result = ($page * $results_per_page) - $results_per_page;
    } else {
        $this_page_first_result = 0;
    }


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
    //universites
    $number_of_results = $result->num_rows;
    $totalPages = $number_of_results / $results_per_page;


    $sql = "SELECT * FROM university LIMIT $this_page_first_result, $results_per_page";
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
    echo '
    <div class="div_page">
    ';

    $totalPages++;

    if ($page > 1) {
        print '<a style="margin: 2px;" id="Previous" class="page" href="index.php?pid=home&page=' . $page = $page - 1 . '#University">Prev</a>';
    }

    for ($page = 1; $page <= $totalPages; $page++) {
        print '<a style="margin: 2px;" id="' . $page . '" class="page" href="index.php?pid=home&page=' . $page . '#University">' . $page . '</a>';
    }

    $next = $_GET['page'] + 1;
    $page--;
    if ($_GET['page'] != $page) {
        print '<a style="margin: 2px;" id="Next" class="page" href="index.php?pid=home&page=' . $next . '#University">Next</a>';
    }

    echo "
        </div>
        <script>
              document.getElementById('".$_GET['page']."').style.background = '#4D636F';
              document.getElementById('".$_GET['page']."').style.color = 'white';
          </script>
        ";
    mysqli_close($con);
}


?>