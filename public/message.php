<?php

    require("../includes/config.php");
    $id = $_SESSION["id"];


    if ($_SESSION["id"] != $_POST["bus_id"])
    {
        apologize("Not authorized to access");
    }
    else 
    {
        $rows = CS50::query("SELECT * FROM messages WHERE timeOrder = ?", $_POST["id"]);
        
        $message = [];
        
        $unread = 0;
        
        foreach ($rows as $row)
        {
            $message = [
                "message" => $row["message"],
                "timeDate" => $row["timeDate"],
                "user_name" => $row["user_name"],
                "email" => $row["email"],
                "name" => $row["name"],
                "red" => $row["red"],
                "replied" => $row["replied"]
            ];
        
            
        }
        
        if ($row["red"] == NULL)
        {
            CS50::query("UPDATE messages SET red = 1 WHERE timeOrder = ?", $_POST["id"]);
        }
        
        render("message_read.php", ["message" => $message,  "title" => "Message"]);
        
    }

?>