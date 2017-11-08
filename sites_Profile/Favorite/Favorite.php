<?php
$con = new mysqli('localhost','root','','db_iebook_8003115736_v');

$Name_User = $_SESSION['user'];
$Id_User= '';
$Id_Book = '';

//User
$sql_User = "SELECT * FROM user WHERE  User_Name = '$Name_User'";
$result_user = $con->query($sql_User);
if ($result_user->num_rows > 0) {
while ($row_User = $result_user->fetch_assoc()) {
    $Id_User = $row_User['Id'];
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
                    <p style="text-transform: uppercase"><i class="fa fa-Author fa-fw w3-margin-right w3-text-theme"></i> '.$row_User['Country'] . "," . $row_User['City'] .'</p>
                    <p style="text-transform: uppercase"><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>'.$row_User['Date_Of_Birth'].'</p>
                </div>
            </div>
            <br>

            <!-- Accordion -->
            <div class="w3-card-2 w3-round">
                <div class="w3-white">
                    <button onclick="location.href=\'index.php?pid=Favorite\'" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-heart-o fa-fw w3-margin-right"></i> My Favorite</button>
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

echo '
<!-- Middle Column -->
<div class="Book w3-col s7" style="margin-left: -2%; margin-right: 2%">
    <ul>
';
    //Favorite
    $sql_favorite = "SELECT * FROM favorite_book WHERE User_Id=$Id_User";
    $result_favorite = $con->query($sql_favorite);
    if ($result_favorite->num_rows > 0) {
        while ($row_favorite = $result_favorite->fetch_assoc()) {
            $Id_Book_Favorite = $row_favorite['Book_Id'];

            //book
            $sql_book = "SELECT * FROM book,user WHERE Id_Book=$Id_Book_Favorite AND User_Id=Id";
            $result_book = $con->query($sql_book);
            if ($result_book->num_rows > 0) {
                while ($row_book = $result_book->fetch_assoc()) {
                    $Id_Book = $row_book['Id_Book'];
                    echo '
            <div class="w3-container w3-card-2 w3-padding-small w3-col" style="max-width: 235px; margin-left: 1%; margin-top: -1.7%; margin-bottom: 5%">
                                    <li>
                                        <div class="s-product" style="width:155px;">
                                            <div class="s-product-img">
                                                <img src="Upload_Books/' . $row_book['Image_Book'] . '" alt="" width="100%" height="217">
                                                <div class="s-product-hover">
                                                    <ul>
                      <li><a class="UnFavorite" title="Un Favorite" value="'.$Id_Book.'" name="'.$Id_User.'"><i class="fa fa-heart w3-text-red"></i></a></li>
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
        }
    }else{
        echo '
                    <div class="w3-col w3-round w3-card-2 w3-white w3-xlarge w3-text-red" align="center" style="min-height: 300px; margin-top: -1.7%; min-width: 101.5%">
                        <p class="w3-padding-64">You don\'t have any favorite book.</p>
                        <a class="w3-button w3-green" style="text-decoration: none" href="index.php?pid=IEBook">Go Books</a>
                    </div>
                ';
    }
    echo'
    </ul>
</div>
<!-- End Middle Column -->
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
?>