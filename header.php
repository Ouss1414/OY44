<?php
if (empty($_GET["pid"])){
    $PageID = "Home";
}else{
    $pageID = $_GET['pid'];
}
?>
<body>
<!-- Navbar (sit on top) -->
<div style="margin-top: 50px;">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card-2">
        <?php
            if ($PageID == 'IEBook'){
                echo '<a href="index.php?pid=IEBook" class="w3-bar-item w3-button"><b>IEB</b>ook</a>';
            }else{
                echo '<a href="index.php?pid=Home" class="w3-bar-item w3-button"><b>MY</b> University</a>';
            }
        ?>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small" style="text-transform: uppercase;">
            <a href="index.php?pid=Home" class="w3-bar-item w3-button">Home</a>
            <a href="index.php#University" class="w3-bar-item w3-button">University</a>
            <a href="index.php?pid=IEBook" class="w3-bar-item w3-button">IEBook</a>
            <a href="index.php?pid=About" class="w3-bar-item w3-button">About</a>
            <a href="index.php?pid=Contact" class="w3-bar-item w3-button">Contact</a>
        </div>
    </div>
</div>