<?php
$university = $_GET['uni'];
$college = $_GET['college'];
$department = $_GET['dep'];
?>
<div class="w3-margin-top w3-margin-left w3-padding-small w3-hover-text-gray w3-text-blue">
    <a href="index.php?pid=Home">Home</a> -
    <a href="index.php#University" style="text-transform: uppercase"><?= $university ?> University</a> -
    <a href="index.php?pid=Colleges&uni=taibah" style="text-transform: uppercase">College_of_<?= $college ?> </a> -
    <a href="index.php?pid=Department&uni=taibah&college=Computer_Science_and_Engineering&dep=CS" style="text-transform: uppercase"> <?= $department ?></a>
</div>

<div class="w3-row w3-card-2 w3-margin-top w3-margin-left w3-margin-right w3-padding">
    <a href="index.php?pid=Add_Post&uni=<?=$university?>&college=<?=$college?>&dep=<?=$department?>" class="w3-button w3-border" style="text-decoration: none">Add Post</a> -
    <select class="w3-theme-2 w3-margin" style="width: 15%">
        <option value="null">Sort --- </option>
        <option value="date">Date</option>
        <option value="name">Name</option>
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

            <!-- Post -->
            <div class="w3-row" style="margin-top: 15px; cursor: pointer" onclick="window.location.href='index.php?pid=Posts&uni=<?=$university?>&college=<?=$college?>&dep=<?=$department?>'">
                <div  class="w3-padding w3-theme-d2" style="width: 95%; min-height: 110px;margin-left: 2.5%;">
                    <div class="w3-col s1">
                        <div class="w3-row s1 w3-text-light-gray w3-hover-text-black w3-left" style="margin: 5px">Subject:</div>
                        <div class="w3-row s1 w3-text-light-gray w3-hover-text-black w3-left" style="margin: 5px">writer:</div>
                        <div class="w3-row s1 w3-text-light-gray w3-hover-text-black w3-left" style="margin: 5px">Date:</div>
                    </div>
                </div>
                <div class="w3-dark-grey" style="width: 95%;margin-left: 2.5%;">
                    <a href="#" name="Like" title="LIKE" class="fa fa-thumbs-up w3-large w3-hover-green w3-dark-grey w3-padding" style="text-decoration: none;"> 0 </a>
                    <a href="#" name="disLike" title="DISLIKE" class="fa fa-thumbs-down w3-large w3-hover-red w3-dark-grey w3-padding" style="text-decoration: none;"> 0 </a>
                </div>
            </div>
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

            <!-- Post -->
            <div class="w3-row" style="margin-top: 15px; cursor: pointer" onclick="window.location.href='index.php?pid=Posts&uni=<?=$university?>&college=<?=$college?>&dep=<?=$department?>'">
                <div  class="w3-padding w3-theme-d2" style="width: 95%; min-height: 110px;margin-left: 2.5%;">
                    <div class="w3-col s1">
                        <div class="w3-row s1 w3-text-light-gray w3-hover-text-black w3-left" style="margin: 5px">Subject:</div>
                        <div class="w3-row s1 w3-text-light-gray w3-hover-text-black w3-left" style="margin: 5px">writer:</div>
                        <div class="w3-row s1 w3-text-light-gray w3-hover-text-black w3-left" style="margin: 5px">Date:</div>
                    </div>
                </div>
                <div class="w3-dark-grey" style="width: 95%;margin-left: 2.5%;">
                    <a href="#" name="Like" title="LIKE" class="fa fa-thumbs-up w3-large w3-hover-green w3-dark-grey w3-padding" style="text-decoration: none;"> 0 </a>
                    <a href="#" name="disLike" title="DISLIKE" class="fa fa-thumbs-down w3-large w3-hover-red w3-dark-grey w3-padding" style="text-decoration: none;"> 0 </a>
                </div>
            </div>
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

            <!-- Post -->
            <div class="w3-row" style="margin-top: 15px; cursor: pointer" onclick="window.location.href='index.php?pid=Posts&uni=<?=$university?>&college=<?=$college?>&dep=<?=$department?>&sub=welcome'">
                <div  class="w3-padding w3-theme-d2" style="width: 95%; min-height: 110px;margin-left: 2.5%;">
                    <div class="w3-col s1">
                        <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">Subject: <i>$welcome</i></div>
                        <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">writer: <i>$name of writer</i></div>
                        <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">Date: <i>$01/01/1999</i></div>
                    </div>
                </div>
                <div class="w3-dark-grey" style="width: 95%;margin-left: 2.5%;">
                    <a href="#" name="Like" title="LIKE" class="fa fa-thumbs-up w3-large w3-hover-green w3-dark-grey w3-padding" style="text-decoration: none;"> 0 </a>
                    <a href="#" name="disLike" title="DISLIKE" class="fa fa-thumbs-down w3-large w3-hover-red w3-dark-grey w3-padding" style="text-decoration: none;"> 0 </a>
                </div>
            </div>
        </div>
        <!-- End Background Post For Student -->
    </div>
    <!-- End Right column -->
</div>