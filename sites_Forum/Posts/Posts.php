<?php
if (isset($_SESSION['user'])) {

    $university = $_GET['uni'];
    $college = $_GET['college'];
    $department = $_GET['dep'];
    $subject = $_GET['sub'];

    echo '
        <div class="w3-margin-top w3-margin-left w3-padding-small w3-hover-text-gray w3-text-blue">
            <a href="index.php?pid=Home">Home</a> -
            <a href="index.php#University" style="text-transform: uppercase"><?= $university ?> University</a> -
            <a href="index.php?pid=Colleges&uni=taibah" style="text-transform: uppercase">College_of_<?= $college ?> </a> -
            <a href="index.php?pid=Department&uni=taibah&college=Computer_Science_and_Engineering&dep=CS" style="text-transform: uppercase"> <?= $department ?></a> -
            <a href="index.php?pid=Posts&uni=taibah&college=Computer_Science_and_Engineering&dep=CS" style="text-transform: uppercase"> <?= $subject ?></a>
        </div>
        
        <div class="w3-row">
        
            <!-- left Column -->
            <div class="w3-col m10">
        
                <!-- Background Post -->
                <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center w3-margin" style="width: 95%;min-height: 400px">
        
                    <!-- Head Posts -->
                    <div class="w3-display-container w3-margin-bottom">
                        <div class="w3-display-topleft w3-dark-grey w3-padding" style="text-transform: uppercase;margin-top: 10px;width: 100%">Subject: $welcome</div>
                    </div>
        
                    <!-- Border -->
                    <div class="w3-border-bottom w3-margin-left w3-margin-right" style="margin-top: 70px"></div>
        
                    <!-- Post -->
                    <div class="w3-row" style="margin: 5px 0 0 50px;">
                        <div  class="w3-padding" style="width: 95%; min-height: 110px;margin-left: 2.5%;">
                            <div class="w3-col s1">
                                <div class="w3-row s1 w3-text-black" style="text-align: left;margin: 5px;width: 1000px">Date: <i>$01/01/1999</i></div>
                                <div class="w3-row s1 w3-text-black" style="text-align: left;margin: 5px;width: 1000px">writer: <i>$name of writer</i></div>
                                <div class="w3-row s1 w3-text-black" style="text-align: left;margin: 5px;width: 1000px">Number of Likes: <i>$0</i></div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Border -->
                    <div class="w3-border-bottom w3-margin-right w3-margin-left"></div>
        
                    <div class="w3-text-black w3-large w3-padding-48" style="margin: 0 50px 0 50px" >
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                        test test test test test test test test test test test test test test test
                    </div>
                </div>
            </div>
        
            <!-- right column -->
            <div class="w3-col m2">
                <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center w3-margin-top" style="width: 220px;height: 600px">
                    <p>ADS</p>
                </div>
            </div>
        </div>
            ';
}else{
    echo '<meta http-equiv="refresh" content="0; \'index.php?pid=Login\'"/>';
}
?>