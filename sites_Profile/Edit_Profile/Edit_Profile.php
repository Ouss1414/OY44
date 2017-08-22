<?php
if (isset($_SESSION['user'])) {
    echo '
            <div class="w3-container w3-margin-right w3-margin-left w3-padding-32" style="margin-top: 50px;background-color: #f1f1f1">

                <h1 style=" margin-left: 20%;text-transform: uppercase;">Edit Profile</h1>

                <hr>
                ';
                    Edit_Profile();
            echo '
                </div>
            ';
}else{
    echo '<meta http-equiv="refresh" content="0; \'index.php?pid=Home\'"/>';
}
