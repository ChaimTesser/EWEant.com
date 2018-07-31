<?php

    // configuration
    require("../includes/config.php"); 
    
    //get previous page
    
    $prev = $_SESSION["prev_page"];
    
    // log out current user, if any
    if (!empty($prev))
    {
        logout();
        redirect($prev);
    }
    else
    {
        logout();
        redirect("/");
    }
?>
