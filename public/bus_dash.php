<?php
    require("../includes/config.php");
   
   if ($_SESSION["type"] != "bus")
   {
       apologize("Must be logged in as Business to view page.");
   }
   else {
       $infos = CS50::query("SELECT * FROM business WHERE bus_id = ? ", $_SESSION['id']);

        $bus = [];

       foreach ($infos as $info)
       {
      
           $bus = [
               "id" => $info["bus_id"],
               "name" => $info["name"],
               "address" => $info["address"],
               "city" => $info["city"],
               "state" => $info["state"],
               "zip" => $info["zip"],
               "phone" => $info["phone"],
               "email" => $info["email"],
               "website" => $info["website"],
               "bus_type" => $info["bus_type"],
               "desc" => $info["desc"],
               "pic" => $info["pic"],
               "rate" => $info["rate"]
               ];
       }
       
       $unr = CS50::query("SELECT red FROM messages WHERE bus_id= ?", $_SESSION["id"]);
       
       $unreadCount = 0;
       
       foreach ($unr as $un)
       {
           if ($un["red"] == NULL)
           {
               $unreadCount += 1;
           }
       }
       
   render("bus_dash_view.php", ["bus" => $bus, "unreadCount" => $unreadCount, "title" => "Dashboard"]); }
?>