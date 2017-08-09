<?php
    if (isset($_SESSION['user'])){
        $university = $_GET['uni'];
        echo '
            <div class="w3-margin-top w3-margin-left w3-padding-small w3-hover-text-gray w3-text-blue">
                <a href="index.php?pid=Home" style="text-transform: uppercase">Home</a> -
                <a href="index.php#University" style="text-transform: uppercase"><?= $university ?> university</a>
            </div>
            
            
            <!-- Grid -->
            <div class="w3-row-padding w3-margin-bottom w3-margin" id="plans">
            
            <!--    <!-- College Section -->
            <!--    <div class="w3-container" style="padding-bottom: 32px; text-transform: uppercase;" id="College">-->
            <!--        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">College</h3>-->
            <!--    </div>-->
            
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
    }else{
        header('Location: http://localhost/OY44/index.php?pid=Login');
    }


?>
