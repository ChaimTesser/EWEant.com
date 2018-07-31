<?php

    // configuration
    require("../includes/config.php");

    // add http:// if left out of website
    function addhttp($url) {
    if ($url != "")
    {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
    }
        
    }
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("registerbusform.php", ["title" => "Register Your Business"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
 
       
        if (CS50::query("INSERT IGNORE INTO users (username, hash, type) VALUES(?, ?, 'bus')", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT)) == 0)
        {
                      apologize("username exists");  
        }
        else
        {
            $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            $_SESSION["id"] = $id;
            $_SESSION["type"] = "bus";

            
            CS50::query("INSERT INTO `business`(`user_id`, `name`, `address`, `city`, `state`, `zip`, `phone`, `email`, `bus_type`, `website`, `desc`) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",  $_SESSION["id"], $_POST["name"], $_POST["address"], $_POST["city"], $_POST["state"], $_POST["zip"], $_POST["phone"],
            $_POST["email"], $_POST["type"], addhttp($_POST["website"]), $_POST["desc"] );
            
            header("Location: /login.php");
            die();
        }



    }

?>