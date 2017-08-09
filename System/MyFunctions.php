<?php

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