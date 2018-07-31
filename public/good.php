<?php
       require("../includes/config.php");

    $rows = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    
    $firstLast = [];
    
    foreach ($rows as $row)
    {
        $firstLast = [
            
            "first" => ucfirst($row["firstname"]),
            "last" => ucfirst($row["lastname"])
            
            ];
    }
    
    date_default_timezone_set('America/New_York');
    $time = date('l, F jS, Y g:i:s A');
    
    CS50::query("INSERT INTO good (id, info, first, lastInt, timeDate) VALUES (?, ?, ? , ?, ?)", $_SESSION["bus"], $_POST["good_info"], $firstLast["first"], substr($firstLast["last"], 0, 1).".", $time );
    CS50::query("UPDATE business SET rate = rate + 1 WHERE bus_id = ?", $_SESSION["bus"]);
    
    redirect('/business.php?bus_id='.$_SESSION['bus']);

?>