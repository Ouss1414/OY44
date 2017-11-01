<?php
    session_start();
    include_once "System/Connect.php";
    require "system/myFunctions.php";
    require "system/requestHandel.php";
    require "System/DBoprations.php";

if(empty($_GET['CP'])){
    $_GET['CP'] = 'home';
}
    if ($_GET['CP'] == 'home'){
        $welcome = 'active';
    }else if ($_GET['CP'] == 'New-Book'){
        $New_Book = 'active';
    }else if ($_GET['CP'] == 'new-post'){
        $new_post = 'active';
    }else if ($_GET['CP'] == 'Mailbox'){
        $Mail = 'visible';
        $Mailbox = 'active';
    }else if ($_GET['CP'] == 'Mailbox-compose'){
        $Mail = 'visible';
        $Mailbox_compose = 'active';
    }else if ($_GET['CP'] == 'Mailbox-message'){
        $Mail = 'visible';
        $Mailbox_message = 'active';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="ControlPanel/assets/images/favicon.ico">

    <title>MyUniversity | <?= $Pages ?></title>

    <link rel="stylesheet" href="ControlPanel/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="ControlPanel/assets/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="ControlPanel/assets/css/bootstrap.css">
    <link rel="stylesheet" href="ControlPanel/assets/css/neon-core.css">
    <link rel="stylesheet" href="ControlPanel/assets/css/neon-theme.css">
    <link rel="stylesheet" href="ControlPanel/assets/css/neon-forms.css">
    <link rel="stylesheet" href="ControlPanel/assets/css/custom.css">

    <script src="ControlPanel/assets/js/jquery-1.11.3.min.js"></script>

    <!--[if lt IE 9]><script src="ControlPanel/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body class="page-body  page-fade">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <div class="sidebar-menu">

        <div class="sidebar-menu-inner">

            <header class="logo-env">

                <!-- logo -->
                <div class="logo">
                    <a href="ControlPanel.php?CP=home">
                        <img src="ControlPanel/assets/images/logo@2x.png" width="120" alt="" />
                    </a>
                </div>

                <!-- logo collapse icon -->
                <div class="sidebar-collapse">
                    <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>


                <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                <div class="sidebar-mobile-menu visible-xs">
                    <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>

            </header>


            <ul id="main-menu" class="main-menu">

                <li class="<?= $welcome ?>">
                    <a href="ControlPanel.php?CP=home">
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

                <li class="<?= $New_Book ?>">
                    <a href="ControlPanel.php?CP=New-Book">
                        <i class="entypo-upload"></i>
                        <span class="title">New Book</span>
                    </a>
                </li>

                <li class="<?= $new_post ?>">
                    <a href="ControlPanel.php?CP=new-post">
                        <i class="entypo-pencil"></i>
                        <span class="title">New Post</span>
                    </a>
                </li>
            </ul>

        </div>

    </div>

    <div class="main-content">

        <div class="row">

            <!-- Profile Info and Notifications -->
            <div class="col-md-6 col-sm-8 clearfix">

                <ul class="user-info pull-left pull-none-xsm">

                    <!-- Profile Info -->
                    <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="ControlPanel/assets/images/thumb-1@2x.png" alt="" class="img-circle" width="44" />
                            John Henderson
                        </a>

                        <ul class="dropdown-menu">

                            <!-- Reverse Caret -->
                            <li class="caret"></li>

                            <li>
                                <a href="ControlPanel/Mail/Mailbox/mailbox.html">
                                    <i class="entypo-mail"></i>
                                    Inbox
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="entypo-clipboard"></i>
                                    Tasks
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>

                <ul class="user-info pull-left pull-right-xs pull-none-xsm">

                    <!-- Message Notifications -->
                    <li class="notifications dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="entypo-mail"></i>
                            <span class="badge badge-secondary">10</span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <form class="top-dropdown-search">

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search anything..." name="s" />
                                    </div>

                                </form>

                                <ul class="dropdown-menu-list scroller">
                                    <li class="active">
                                        <a href="#">
											<span class="image pull-right">
												<img src="ControlPanel/assets/images/thumb-1@2x.png" width="44" alt="" class="img-circle" />
											</span>

                                            <span class="line">
												<strong>Luc Chartier</strong>
												- yesterday
											</span>

                                            <span class="line desc small">
												This ain’t our first item, it is the best of the rest.
											</span>
                                        </a>
                                    </li>

                                    <li class="active">
                                        <a href="#">
											<span class="image pull-right">
												<img src="ControlPanel/assets/images/thumb-2@2x.png" width="44" alt="" class="img-circle" />
											</span>

                                            <span class="line">
												<strong>Salma Nyberg</strong>
												- 2 days ago
											</span>

                                            <span class="line desc small">
												Oh he decisively impression attachment friendship so if everything.
											</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
											<span class="image pull-right">
												<img src="ControlPanel/assets/images/thumb-3@2x.png" width="44" alt="" class="img-circle" />
											</span>

                                            <span class="line">
												Hayden Cartwright
												- a week ago
											</span>

                                            <span class="line desc small">
												Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
											</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
											<span class="image pull-right">
												<img src="ControlPanel/assets/images/thumb-4@2x.png" width="44" alt="" class="img-circle" />
											</span>

                                            <span class="line">
												Sandra Eberhardt
												- 16 days ago
											</span>

                                            <span class="line desc small">
												On so attention necessary at by provision otherwise existence direction.
											</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="external">
                                <a href="ControlPanel.php?CP=mailbox">All Messages</a>
                            </li>
                        </ul>

                    </li>

                    <!-- Task Notifications -->
                    <li class="notifications dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="entypo-list"></i>
                            <span class="badge badge-warning">1</span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="top">
                                <p>You have 6 pending tasks</p>
                            </li>

                            <li>
                                <ul class="dropdown-menu-list scroller">
                                    <li>
                                        <a href="#">
											<span class="task">
												<span class="desc">Procurement</span>
												<span class="percent">27%</span>
											</span>

                                            <span class="progress">
												<span style="width: 27%;" class="progress-bar progress-bar-success">
													<span class="sr-only">27% Complete</span>
												</span>
											</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
											<span class="task">
												<span class="desc">App Development</span>
												<span class="percent">83%</span>
											</span>

                                            <span class="progress progress-striped">
												<span style="width: 83%;" class="progress-bar progress-bar-danger">
													<span class="sr-only">83% Complete</span>
												</span>
											</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
											<span class="task">
												<span class="desc">HTML Slicing</span>
												<span class="percent">91%</span>
											</span>

                                            <span class="progress">
												<span style="width: 91%;" class="progress-bar progress-bar-success">
													<span class="sr-only">91% Complete</span>
												</span>
											</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
											<span class="task">
												<span class="desc">Database Repair</span>
												<span class="percent">12%</span>
											</span>

                                            <span class="progress progress-striped">
												<span style="width: 12%;" class="progress-bar progress-bar-warning">
													<span class="sr-only">12% Complete</span>
												</span>
											</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
											<span class="task">
												<span class="desc">Backup Create Progress</span>
												<span class="percent">54%</span>
											</span>

                                            <span class="progress progress-striped">
												<span style="width: 54%;" class="progress-bar progress-bar-info">
													<span class="sr-only">54% Complete</span>
												</span>
											</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
											<span class="task">
												<span class="desc">Upgrade Progress</span>
												<span class="percent">17%</span>
											</span>

                                            <span class="progress progress-striped">
												<span style="width: 17%;" class="progress-bar progress-bar-important">
													<span class="sr-only">17% Complete</span>
												</span>
											</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="external">
                                <a href="#">See all tasks</a>
                            </li>
                        </ul>

                    </li>

                </ul>

            </div>


            <!-- Raw Links -->
            <div class="col-md-6 col-sm-4 clearfix hidden-xs">

                <ul class="list-inline links-list pull-right">

                    <!-- Language Selector -->
                    <li class="dropdown language-selector">

                        Language: &nbsp;
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                            <img src="ControlPanel/assets/images/flags/flag-uk.png" width="16" height="16" />
                        </a>

                        <ul class="dropdown-menu pull-right">
                            <li class="active">
                                <a href="#">
                                    <img src="ControlPanel/assets/images/flags/flag-uk.png" width="16" height="16" />
                                    <span>English</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="ControlPanel/assets/images/flags/flag-sa.png" width="16" height="16" />
                                    <span>Arabic</span>
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li class="sep"></li>


                    <li>
                        <a href="#" data-toggle="chat" data-collapse-sidebar="1">
                            <i class="entypo-chat"></i>
                            Chat

                            <span class="badge badge-success chat-notifications-badge is-hidden">0</span>
                        </a>
                    </li>

                    <li class="sep"></li>

                    <li>
                        <a href="ControlPanel/extra-login.html">
                            Log Out <i class="entypo-logout right"></i>
                        </a>
                    </li>
                </ul>

            </div>

        </div>

        <hr />


        <?php

        //switch for main pages
        switch($Pages){
            case "Mailbox" : include_once "ControlPanel/Mail/Mailbox/mailbox.html";
                break;
            case "Mailbox-compose" : include_once "ControlPanel/Mail/Mailbox-compose/Mailbox-compose.html";
                break;
            case "Mailbox-message" : include_once "ControlPanel/Mail/Mailbox-message/Mailbox-message.html";
                break;
            case "home" : include_once "ControlPanel/home/home.php";
                break;
            case "New-Book" : include_once "ControlPanel/New-Book.php";
                break;
            case "new-post" : include_once "ControlPanel/new-post.html";
                break;
            case "Edit_Book" : include_once "ControlPanel/home/Edit_book.php";
                break;
            case "Add_Exercise" : include_once "ControlPanel/home/Add_Exercise.php";
                break;
            case "Exercise" : include_once "ControlPanel/home/Exercises.php";
                break;
            case "Edit_Exercise" : include_once "ControlPanel/home/Edit_Exercise.php";
                break;
            default: include_once "ControlPanel/home/home.php";
                break;
        }
        ?>





        <!-- Footer -->
        <footer class="main">

            &copy; 2017 <strong>MyUniversity</strong> Powered by <a href="http://Progfields.com" target="_blank">Progfields</a>

        </footer>
    </div>

    <div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25">

        <div class="chat-inner">


            <h2 class="chat-header">
                <a href="#" class="chat-close"><i class="entypo-cancel"></i></a>

                <i class="entypo-users"></i>
                Chat
                <span class="badge badge-success is-hidden">0</span>
            </h2>


            <div class="chat-group" id="group-1">
                <strong>Favorites</strong>

                <a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
                <a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
                <a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
                <a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
                <a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
            </div>


            <div class="chat-group" id="group-2">
                <strong>Work</strong>

                <a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
                <a href="#" data-conversation-history="#sample_history_2"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
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



</body>
</html>