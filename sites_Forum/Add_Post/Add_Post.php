<?php
$university = $_GET['uni'];
$college = $_GET['college'];
$department = $_GET['dep'];
?>
<div class="w3-margin-top w3-margin-left w3-padding-small w3-hover-text-gray w3-text-blue">
    <a href="index.php?pid=Home">Home</a> -
    <a href="index.php#University" style="text-transform: uppercase"><?= $university ?> University</a> -
    <a href="index.php?pid=Colleges&uni=<?= $university ?>" style="text-transform: uppercase">College_of_<?= $college ?> </a> -
    <a href="index.php?pid=Department&uni=<?= $university ?>&college=<?= $college ?>&dep=<?= $department ?>" style="text-transform: uppercase"> <?= $department ?></a> -
    <a href="index.php?pid=Add_Post&uni=<?= $university ?>&college=<?= $college ?>&dep=<?= $department ?>" style="text-transform: uppercase">ADD Post</a>
</div>

<div class="w3-card w3-margin w3-padding-32">
    <h2 class="w3-padding-16 w3-border-bottom w3-border-light-grey" style="margin-left: 28%; width: 600px">ADD POST</h2>

    <div class="w3-row w3-margin-top" style="margin-left: 28%;">
        <label class="w3-row s1 w3-text-theme">Subject:</label>
        <input class="w3-row s1 w3-margin-top" type="text" style="width: 600px; padding: 5px"/>
    </div>

    <div class="w3-row w3-margin-top" style="margin-left: 28%;">
        <label class="w3-row s3 w3-text-theme">Comment:</label>
        <p class="yui-skin-sam">
            <textarea name="myrichtext" id="myrichtext" ></textarea>
            <script>
                var myEditor = new YAHOO.widget.Editor('myrichtext', {
                    height: '300px',
                    width: '600px',
                    dompath: true, //Turns on the bar at the bottom
                    animate: true, //Animates the opening, closing and moving of Editor windows
                    handleSubmit: true
                });
                myEditor.render();
            </script>
        </p>
    </div>

    <div class="w3-row" style="margin-left: 28%;">
        <button class="w3-row s1 w3-button w3-border" type="submit" name="Submit" value="Submit" style="width: 150px">Submit</button>
    </div>
</div>