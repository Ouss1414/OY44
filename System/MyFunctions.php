<?php


function login(){
    if(isset($_SESSION['user'])){
        echo '
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
        <a href="index.php?pid=Edit_Profile" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
        <div class="w3-dropdown-hover w3-hide-small">
            <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>
            <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
                <a href="#" class="w3-bar-item w3-button">One new friend request</a>
                <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
                <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
            </div>
        </div>
        <a href="Login/Logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Log out"><i class="fa fa-sign-out"></i></a>
        <a href="index.php?pid=Profile" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><img src="Images/Icons/avatar2.png" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a>    
        ';
    }else{
        echo ' <a href="index.php?pid=Login" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Log in"><i class="fa fa-sign-in"></i></a>';
    }
}

function isAuth($PageID){
    switch ($PageID){
        case "Profile" :
            $redirectToPage = "Profile";
            break;
        case "Contact" :
            $redirectToPage = "Contact";
            break;
        case "About" :
            $redirectToPage = "About";
            break;
        case "Colleges" :
            $redirectToPage = "Colleges";
            break;
        case "Login" :
            $redirectToPage = "Login";
            break;
        case "Sign_up" :
            $redirectToPage = "Sign_up";
            break;
        case "Department" :
            $redirectToPage = "Department";
            break;
        case "Posts" :
            $redirectToPage = "Posts";
            break;
        case "Edit_Profile" :
            $redirectToPage = "Edit_Profile";
            break;
        case "Add_Post" :
            $redirectToPage = "Add_Post";
            break;
        default :
            $redirectToPage = "Home";
            break;
    }
    return $redirectToPage;
}
?>