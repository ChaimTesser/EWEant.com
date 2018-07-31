<?php

// configuration
    require("../includes/config.php");
    
       $_SESSION["prev_page"] = "";
    
    if (empty($_SESSION["type"]) || $_SESSION["type"] == "user")
    {
    render("search_main.php", ["title" => "Home"]);
    }
    elseif ($_SESSION["type"] == "bus")
    {
        redirect("bus_dash.php");
    }
?> 
