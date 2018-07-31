<?php

    require("../includes/config.php"); 
    
    if ($_SESSION["type"] != "bus")
    {
        apologize("Not authorized.");
    }
    else {
    $rows = CS50::query("SELECT * FROM business WHERE bus_id = ?", $_SESSION["id"]);
    
    $infos = [];
    
    foreach ($rows as $row)
    {    
        
          $infos[] = [
                
                "name" => $row["name"],
                "address" => $row["address"],
                "city" => $row["city"],
                "state" => $row["state"],
                "zip" => $row["zip"],
                "type" => $row["bus_type"],
                "phone" => $row["phone"],
                "email" => $row["email"],
                "website" => $row["website"],
                "desc" => $row["desc"],
                "pic" => $row["pic"],
                "bus_id" => $row["bus_id"],
                "rate" => $row["rate"]
                ];
                
        
    }

  $goods = CS50::query("SELECT * FROM good WHERE id = ? ORDER BY timeOrder DESC", $_SESSION["id"]);
    
    $good_info = [];
    
    foreach ($goods as $good) 
    {
        if ($good["flag"] == NULL)
        {
            $good_info[] = [
                "info" => $good["info"],
                "first" => $good["first"],
                "lastInt" =>$good["lastInt"],
                "timeDate" => $good["timeDate"]
                ];
        }
    }
    
    rendernon("display_view.php", ["good_info" => $good_info, "infos" => $infos, "title" => "Display"]);
    }
?>