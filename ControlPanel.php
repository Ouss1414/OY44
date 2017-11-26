<?php
    session_start();
    include_once "System/Connect.php";
    require "system/myFunctions.php";
    require "system/requestHandel.php";
    require "System/DBoprations.php";

$user_name = $_SESSION['user'];
$Type = '';

//user
$sql = "SELECT * FROM user WHERE User_Name='$user_name'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $Type = $row['User_Type'];
    }
}

        if ($Type == 'dean' || $Type == 'admin' || $Type == 'author') {

            if (empty($_GET['CP'])) {
                $_GET['CP'] = 'Author';
            }
            if ($_GET['CP'] == 'Author') {
                $welcome = 'active';
            } else if ($_GET['CP'] == 'New-Book') {
                $New_Book = 'active';
            } else if ($_GET['CP'] == 'new-post') {
                $new_post = 'active';
            } else if ($_GET['CP'] == 'Mailbox') {
                $Mail = 'visible';
                $Mailbox = 'active';
            } else if ($_GET['CP'] == 'Mailbox-compose') {
                $Mail = 'visible';
                $Mailbox_compose = 'active';
            } else if ($_GET['CP'] == 'Mailbox-message') {
                $Mail = 'visible';
                $Mailbox_message = 'active';
            } else if ($_GET['CP'] == 'Control_University') {
                $Control_University = 'visible';
                $Control_Add_University = 'active';
            } else if ($_GET['CP'] == 'Add_College') {
                $Control_University = 'visible';
                $Control_Add_College = 'active';
            } else if ($_GET['CP'] == 'Add_Department') {
                $Control_University = 'visible';
                $Control_Add_Department = 'active';
            } else if ($_GET['CP'] == 'Update_University') {
                $Control_University = 'visible';
                $Control_Update_University = 'active';
            } else if ($_GET['CP'] == 'Manage_Books') {
                $Control_IEBook = 'visible';
                $Control_Manage_Books = 'active';
            } else if ($_GET['CP'] == 'Add_User') {
                $Control_Users = 'visible';
                $Control_Add_User = 'active';
            }
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta http-equiv="X-UA-Compatible" content="IE=edge">

                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1"/>
                <meta name="description" content="Neon Admin Panel"/>
                <meta name="author" content=""/>

                <link rel="icon" href="ControlPanel/assets/images/favicon.ico">

                <title>MyUniversity | <?= $Pages ?></title>

                <link rel="stylesheet"
                      href="ControlPanel/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
                <link rel="stylesheet" href="ControlPanel/assets/css/font-icons/entypo/css/entypo.css">
                <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
                <link rel="stylesheet" href="ControlPanel/assets/css/bootstrap.css">
                <link rel="stylesheet" href="ControlPanel/assets/css/neon-core.css">
                <link rel="stylesheet" href="ControlPanel/assets/css/neon-theme.css">
                <link rel="stylesheet" href="ControlPanel/assets/css/neon-forms.css">
                <link rel="stylesheet" href="ControlPanel/assets/css/custom.css">

                <script src="ControlPanel/assets/js/jquery-1.11.3.min.js"></script>

                <!--[if lt IE 9]>
                <script src="ControlPanel/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

                <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->


            </head>

            <body class="page-body  page-fade">

            <div class="page-container">
                <!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

                <div class="sidebar-menu">

                    <div class="sidebar-menu-inner">

                        <header class="logo-env">

                            <!-- logo -->
                            <div class="logo">
                                <a href="index.php?pid=Home" style="font-size: 200%"><b>MY</b> University</a>
                            </div>

                            <!-- logo collapse icon -->
                            <div class="sidebar-collapse">
                                <a href="#" class="sidebar-collapse-icon">
                                    <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                                    <i class="entypo-menu"></i>
                                </a>
                            </div>


                            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                            <div class="sidebar-mobile-menu visible-xs">
                                <a href="#" class="with-animation">
                                    <!-- add class "with-animation" to support animation -->
                                    <i class="entypo-menu"></i>
                                </a>
                            </div>

                        </header>


                        <ul id="main-menu" class="main-menu">

                            <li class="<?= $welcome ?>">
                                <a href="ControlPanel.php?CP=Home">
                                    <i class="entypo-home"></i>
                                    <span class="title">Welcome</span>
                                </a>
                            </li>

                            <li class="has-sub">
                                <a href="ControlPanel.php?CP=Mailbox">
                                    <i class="entypo-mail"></i>
                                    <span class="title">Mailbox</span>
                                    <span class="badge badge-secondary">Soon</span>
                                </a>
                                <ul class=" <?= $Mail ?>">
                                    <li class="<?= $Mailbox ?>">
                                        <a>
                                            <i class="entypo-inbox"></i>
                                            <span class="title">Inbox</span>
                                            <span class="badge badge-secondary">Soon</span>
                                        </a>
                                    </li>
                                    <li class="<?= $Mailbox_compose ?>">
                                        <a>
                                            <i class="entypo-pencil"></i>
                                            <span class="title">Compose Message</span>
                                            <span class="badge badge-secondary">Soon</span>
                                        </a>
                                    </li>
                                    <li class="<?= $Mailbox_message ?>">
                                        <a>
                                            <i class="entypo-attach"></i>
                                            <span class="title">View Message</span>
                                            <span class="badge badge-secondary">Soon</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php
                            if ($Type == 'author'){
                            ?>
                            <li class="<?= $New_Book ?>">
                                <a href="ControlPanel.php?CP=New-Book">
                                    <i class="entypo-upload"></i>
                                    <span class="title">New Book</span>
                                </a>
                            </li>
                            <?php
                            }
                            ?>
                            <?php
                            if ($Type == 'dean'){
                            ?>
                            <li class="<?= $new_post ?>">
                                <a href="ControlPanel.php?CP=new-post">
                                    <i class="entypo-pencil"></i>
                                    <span class="title">New Post</span>
                                </a>
                            </li>
                            <?php
                            }
                            ?>

                            <?php
                            if ($Type == 'admin'){
                            ?>
                                <li class="has-sub">
                                    <a href="ControlPanel.php?CP=Control_University">
                                        <i class="entypo-graduation-cap"></i>
                                        <span class="title">Control University</span>
                                    </a>
                                    <ul class=" <?= $Control_University ?>">
                                        <li class="<?= $Control_Add_University ?>">
                                            <a href="ControlPanel.php?CP=Control_University">
                                                <span class="title">Control University</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class=" <?= $Control_University ?>">
                                        <li class="<?= $Control_Add_College ?>">
                                            <a href="ControlPanel.php?CP=Add_College">
                                                <span class="title">Add College</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class=" <?= $Control_University ?>">
                                        <li class="<?= $Control_Add_Department ?>">
                                            <a href="ControlPanel.php?CP=Add_Department">
                                                <span class="title">Add Department</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class=" <?= $Control_University ?>">
                                        <li class="<?= $Control_Update_University ?>">
                                            <a href="ControlPanel.php?CP=Update_University">
                                                <span class="title">Update University</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="has-sub">
                                    <a href="ControlPanel.php?CP=Control_IEBook">
                                        <i class="entypo-book-open"></i>
                                        <span class="title">Control IEBook</span>
                                    </a>
                                    <ul class=" <?= $Control_IEBook ?>">
                                        <li class="<?= $Control_Manage_Books ?>">
                                            <a href="ControlPanel.php?CP=Manage_Books">
                                                <i class="entypo-user"></i>
                                                <span class="title">Manage Books</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="has-sub">
                                    <a href="ControlPanel.php?CP=Control_Users">
                                        <i class="entypo-user"></i>
                                        <span class="title">Control Users</span>
                                    </a>
                                    <ul class=" <?= $Control_Users ?>">
                                        <li class="<?= $Control_Add_User ?>">
                                            <a href="ControlPanel.php?CP=Add_User">
                                                <i class="entypo-user-add"></i>
                                                <span class="title">Add user</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>

                    </div>

                </div>

                <div class="main-content">

                    <?php
                    ControlPanel_head();
                    ?>

                    <hr/>


                    <?php

                    //switch for main pages
                    switch ($Pages) {
                        case "Mailbox" :
                            include_once "ControlPanel/Mail/Mailbox/mailbox.html";
                            break;
                        case "Mailbox-compose" :
                            include_once "ControlPanel/Mail/Mailbox-compose/Mailbox-compose.html";
                            break;
                        case "Mailbox-message" :
                            include_once "ControlPanel/Mail/Mailbox-message/Mailbox-message.html";
                            break;
                        case "Home" :
                            include_once "ControlPanel/home.php";
                            break;
                        case "New-Book" :
                            include_once "ControlPanel/Author/New-Book.php";
                            break;
                        case "new-post" :
                            include_once "ControlPanel/new-post.php";
                            break;
                        case "Edit_Book" :
                            include_once "ControlPanel/Author/Edit_book.php";
                            break;
                        case "Add_Exercise" :
                            include_once "ControlPanel/Author/Add_Exercise.php";
                            break;
                        case "Exercise" :
                            include_once "ControlPanel/Author/Exercises.php";
                            break;
                        case "Edit_Exercise" :
                            include_once "ControlPanel/Author/Edit_Exercise.php";
                            break;
                        case "Control_University" :
                            include_once "ControlPanel/Admin/University/Control_University.php";
                            break;
                        case "Add_University" :
                            include_once "ControlPanel/Admin/University/Add_University.php";
                            break;
                        case "Add_College" :
                            include_once "ControlPanel/Admin/University/Add_College.php";
                            break;
                        case "Add_Department" :
                            include_once "ControlPanel/Admin/University/Add_Department.php";
                            break;
                        case "Update_University" :
                            include_once "ControlPanel/Admin/University/Update_University.php";
                            break;
                        case "Manage_Books" :
                            include_once "ControlPanel/Admin/IEBook/Manage_Books.php";
                            break;
                        case "Add_User" :
                            include_once "ControlPanel/Admin/Users_Folder/Add_User.php";
                            break;
                        default:
                            include_once "ControlPanel/home.php";
                            break;
                    }
                    ?>


                    <!-- Footer -->
                    <footer class="main">

                        &copy; 2017 <strong>MyUniversity</strong> Powered by <a href="http://Progfields.com"
                                                                                target="_blank">Progfields</a>

                    </footer>
                </div>

                <div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1"
                     data-max-chat-history="25">

                    <div class="chat-inner">


                        <h2 class="chat-header">
                            <a href="#" class="chat-close"><i class="entypo-cancel"></i></a>

                            <i class="entypo-users"></i>
                            Chat
                            <span class="badge badge-success is-hidden">0</span>
                        </h2>


                        <div class="chat-group" id="group-1">
                            <strong>Favorites</strong>

                            <a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span
                                        class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
                            <a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
                            <a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
                            <a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
                            <a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
                        </div>


                        <div class="chat-group" id="group-2">
                            <strong>Work</strong>

                            <a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
                            <a href="#" data-conversation-history="#sample_history_2"><span
                                        class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
                            <a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
                        </div>


                        <div class="chat-group" id="group-3">
                            <strong>Social</strong>

                            <a href="#"><span class="user-status is-busy"></span> <em>Velma G. Pearson</em></a>
                            <a href="#"><span class="user-status is-offline"></span> <em>Margaret R. Dedmon</em></a>
                            <a href="#"><span class="user-status is-online"></span> <em>Kathleen M. Canales</em></a>
                            <a href="#"><span class="user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
                        </div>

                    </div>

                    <!-- conversation template -->
                    <div class="chat-conversation">

                        <div class="conversation-header">
                            <a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>

                            <span class="user-status"></span>
                            <span class="display-name"></span>
                            <small></small>
                        </div>

                        <ul class="conversation-body">
                        </ul>

                        <div class="chat-textarea">
                            <textarea class="form-control autogrow" placeholder="Type your message"></textarea>
                        </div>

                    </div>

                </div>

                <!-- Chat Histories -->
                <ul class="chat-history" id="sample_history">
                    <li>
                        <span class="user">Art Ramadani</span>
                        <p>Are you here?</p>
                        <span class="time">09:00</span>
                    </li>

                    <li class="opponent">
                        <span class="user">Catherine J. Watkins</span>
                        <p>This message is pre-queued.</p>
                        <span class="time">09:25</span>
                    </li>

                    <li class="opponent">
                        <span class="user">Catherine J. Watkins</span>
                        <p>Whohoo!</p>
                        <span class="time">09:26</span>
                    </li>

                    <li class="opponent unread">
                        <span class="user">Catherine J. Watkins</span>
                        <p>Do you like it?</p>
                        <span class="time">09:27</span>
                    </li>
                </ul>

                <!-- Chat Histories -->
                <ul class="chat-history" id="sample_history_2">
                    <li class="opponent unread">
                        <span class="user">Daniel A. Pena</span>
                        <p>I am going out.</p>
                        <span class="time">08:21</span>
                    </li>

                    <li class="opponent unread">
                        <span class="user">Daniel A. Pena</span>
                        <p>Call me when you see this message.</p>
                        <span class="time">08:27</span>
                    </li>
                </ul>


            </div>


            <!-- Imported styles on this page -->
            <link rel="stylesheet" href="ControlPanel/assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
            <link rel="stylesheet" href="ControlPanel/assets/js/rickshaw/rickshaw.min.css">

            <!-- Bottom scripts (common) -->
            <script src="ControlPanel/assets/js/gsap/TweenMax.min.js"></script>
            <script src="ControlPanel/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
            <script src="ControlPanel/assets/js/bootstrap.js"></script>
            <script src="ControlPanel/assets/js/joinable.js"></script>
            <script src="ControlPanel/assets/js/resizeable.js"></script>
            <script src="ControlPanel/assets/js/neon-api.js"></script>
            <script src="ControlPanel/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


            <!-- Imported scripts on this page -->
            <script src="ControlPanel/assets/js/jquery.bootstrap.wizard.min.js"></script>
            <script src="ControlPanel/assets/js/jquery.validate.min.js"></script>
            <script src="ControlPanel/assets/js/jquery.inputmask.bundle.js"></script>
            <script src="ControlPanel/assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
            <script src="ControlPanel/assets/js/bootstrap-datepicker.js"></script>
            <script src="ControlPanel/assets/js/bootstrap-switch.min.js"></script>
            <script src="ControlPanel/assets/js/jquery.multi-select.js"></script>
            <script src="ControlPanel/assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
            <script src="ControlPanel/assets/js/jquery.sparkline.min.js"></script>
            <script src="ControlPanel/assets/js/rickshaw/vendor/d3.v3.js"></script>
            <script src="ControlPanel/assets/js/rickshaw/rickshaw.min.js"></script>
            <script src="ControlPanel/assets/js/raphael-min.js"></script>
            <script src="ControlPanel/assets/js/morris.min.js"></script>
            <script src="ControlPanel/assets/js/toastr.js"></script>
            <script src="ControlPanel/assets/js/neon-chat.js"></script>


            <!-- JavaScripts initializations and stuff -->
            <script src="ControlPanel/assets/js/neon-custom.js"></script>


            <!-- Demo Settings -->
            <script src="ControlPanel/assets/js/neon-demo.js"></script>


            <!-- Imported scripts on this page -->
            <script src="ControlPanel/assets/js/fileinput.js"></script>
            <script src="ControlPanel/assets/js/dropzone/dropzone.js"></script>
            <link rel="stylesheet" href="ControlPanel/assets/js/wysihtml5/bootstrap-wysihtml5.css">
            <link rel="stylesheet" href="ControlPanel/assets/js/selectboxit/jquery.selectBoxIt.css">
            <script src="System/delete_book.js"></script>
            <script src="System/Add_exercise.js"></script>
            <script src="System/Delete_exercise.js"></script>
            <script src="System/Edit_exercise.js"></script>
            <script src="System/Remove_university.js"></script>
            <script src="JS/Add_more_college.js"></script>
            <script src="JS/Add_more_dep.js"></script>


            </body>
            </html>
<?php
        } else {
            header('Location: http://localhost/OY44/Index.php?pid=Login&CP=ControlPanel');
        }

?>