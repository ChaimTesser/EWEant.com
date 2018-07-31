<?php
   

    // configuration
    require("../includes/config.php");
    
    
    
    
    $rows = CS50::query("SELECT * FROM business WHERE bus_id = ?", $_GET["bus_id"]);

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
   // dump($infos);
                
    $_SESSION["bus"] = $infos[0]["bus_id"];   

    $goods = CS50::query("SELECT * FROM good WHERE id = ? ORDER BY timeOrder DESC LIMIT 10", $_SESSION["bus"]);
    
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
    $firstLast = [];    
    if (!empty($_SESSION["id"]))
    {
    $names = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    

    
    foreach ($names as $name)
    {
        $firstLast[] = [
            
            "first" => ucfirst($name["firstname"]),
            "last" => ucfirst($name["lastname"]),
            "username" => $name['username'],
            "email" => $name["email"]
            
            ];
    }
    
    }
    
    $_SESSION["prev_page"] = "/business.php?bus_id=" . $infos[0]["bus_id"];
    
    
    
    render("bus_view.php", ["infos" => $infos, "good_info" => $good_info, "goods" => $goods, "firstLast" => $firstLast, "title" => "Business"]);

?>
