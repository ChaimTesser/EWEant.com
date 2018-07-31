<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //autheticate for non compatible browser
        if ($_POST["username"] == "" || $_POST["password"] == "")
            apologize("All fields required");
        elseif ($_POST["password"] != $_POST["confirmation"])
           apologize("Passwords do not match");
        
        if (CS50::query("INSERT IGNORE INTO users (username,  type, firstname, lastname, address, city, state, zip, phone, email, hash) VALUES(?, 'user', ?, ?, ?, ?, ?, ?, ?, ?, ?)",
        $_POST["username"], $_POST["firstname"], $_POST["lastname"], $_POST["address"], $_POST["city"], $_POST["state"],
        $_POST["zip"], $_POST["phone"], $_POST["email"], password_hash($_POST["password"], PASSWORD_DEFAULT)) == 0 )
        {
                      echo("username exists");  
        }
        else
        {
            $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            $_SESSION["id"] = $id;
            $_SESSION["type"] = "user";

        
            header("Location: /index.php");
            die();
        }


    }

?>