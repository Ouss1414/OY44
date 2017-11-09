<?php

$user = $_GET['u'];

?>


<html>
<head>
    <link rel="stylesheet" type="text/css" href="Css/Style.css">
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="javascript/chat.js"></script>
</head>
<body>

<div class='chatContainer'>
    <div class="chatHeader">
        <h3>Welcome <?php echo ucwords($user); ?>   </h3>

    </div>
    <div class="chatMessages">

        <?php

        $con = new mysqli('localhost', 'root','' , 'Chat');

        $query = "SELECT * FROM Messages";
        $run = $con->query($query);

        while($fetch = $run->fetch_array()) {

            $name = $fetch['name'];
            $message = $fetch['message'];

            echo "<li class='cm'><b>".ucwords($name)."</b> - ".$message."</li>";


        }
        ?>






    </div>
    <div class="chatBottom">
        <form action="#" onsubmit="return false;" id="chatForm">
            <input type="hidden" id="name" value="<?php echo $user; ?>">
            <input type="text" name="text" id="text" value="" placeholder="Type your message" >
            <input type="submit" name="submit" value="Post">

        </form>

    </div>

</div>

</body>

</html>

