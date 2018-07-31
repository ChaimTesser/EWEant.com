<?php
    // configuration
    require("../includes/config.php"); 



    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("login_form.php", ["title" => "Log In"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        /* validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        } */

        // query database for user
        $rows = CS50::query("SELECT * FROM users WHERE username = ?", $_POST["username"]);

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (password_verify($_POST["password"], $row["hash"]))
            {
                
                
                $_SESSION["type"] =$row["type"];

                // redirect to search or dashboard
                
                
                if ($_SESSION['type']=="user")
                {
                    $_SESSION["id"] = $row["id"];
                    
                    if (!empty($_SESSION["prev_page"]))
                        {
                          redirect($_SESSION["prev_page"]);  
                        }
                    else {
                    redirect("/"); }
                }
                elseif ($_SESSION["type"]=="bus")
                {
                    $_SESSION["prev_page"] = "";
                    $bus_id = CS50::query("SELECT bus_id FROM business WHERE user_id = ?", $row['id'] );
                    $id=$bus_id[0];
                    $_SESSION["id"] = $id["bus_id"];
                    redirect("/bus_dash.php");
                }
            }
        }

        // else apologize
        apologize("Invalid username and/or password.");
    }

?>
