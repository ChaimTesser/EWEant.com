<?php
    require("../includes/config.php");
    
    $message = CS50::query("SELECT * FROM messages WHERE bus_id = ? ORDER BY timeOrder DESC", $_SESSION["id"]);
    
    $msg = [];
    
    $unread = 0;
    
    foreach ($message as $mes)
    {
        $msg[] = [
            "bus_id" => $mes["bus_id"],
            "id" => $mes["timeOrder"],
            "message" => $mes["message"],
            "timeDate" => $mes["timeDate"],
            "user_name"=> $mes["user_name"],
            "name" => $mes["name"],
            "email" => $mes["email"],
            "red" => $mes ["red"],
            "replied" => $mes["replied"]
        ];
        if ($mes["red"] == NULL)
            {
                $unread += 1;
            }
    }

    render("message_view.php", ["msg" => $msg, "unread" => $unread,"title" => "Messages"]);

?>