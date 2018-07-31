<?php
    require("../includes/config.php");
    
    date_default_timezone_set('America/New_York');
    $time = date('l, F jS, Y g:i:s A');
    
    $rows = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    
    $user_info = [];
    
    foreach ($rows as $row)
    {
        $user_info[] = [
                "username" => $row["username"],
                "name" => ucfirst($row["firstname"])." ".substr(ucfirst($row["lastname"]), 0, 1).".",
                "email" => $row["email"]
                
            ];
    }
    
    
    $info = $user_info[0];

   
    CS50::query("INSERT INTO messages (bus_id, message, timeDate, user_name, name, email) VALUE(?, ?, ?, ?, ?, ?)",
    $_SESSION["bus"], $_POST["message"], $time, $info["username"], $info["name"], $info["email"]
    );
    
    redirect('/business.php?bus_id='.$_SESSION['bus']);
?>