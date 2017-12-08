<?php

$user = $_GET['u'];
$sb = $_GET['s'];

$Pid = $_GET['Pid'];

?>



<html>
<head>
    <link rel="stylesheet" type="text/css" href="Css/Style.css">
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="JavaScript/Chat.js"></script>
</head>
<body>








<div class='chatContainer'>
    <div class="chatHeader">
        <h3>Welcome <?php echo ucwords($user); ?>   </h3>


    </div>
    <div class="chatMessages">

        <?php

        $con = new mysqli('localhost', 'root','' , 'chat');

        $query = "SELECT * FROM Messages WHERE Sbook = '$sb'";
        $run = $con->query($query);

        while($fetch = $run->fetch_array()) {

            $name = $fetch['name'];
            $message = $fetch['message'];

            echo "<li class='cm'><b>".ucwords($name)."</b> - ".$message."</li>";


        }
        ?>




        <form style="display: none">
            <input type="hidden" id="Sbook" value="<?php echo $sb;?>">
        </form>

    </div>
    <div class="chatBottom">
        <form action="#" onsubmit="return false;" class="chatForm" enctype="multipart/form-data">

            <input type="hidden" id="name" value="<?php echo $user ?>" >

            <input type="hidden" id="Sbook" value="<?php echo $sb ?>" >

            <input type="text" name="text" id="text" value="" placeholder="Type your message" >
            <input type="submit" name="submit" value="Post">



        </form>

    </div>

</div>

</body>

</html>

