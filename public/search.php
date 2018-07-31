<?php
    // configuration
    require("../includes/config.php");
    
    $_SESSION["prev_page"] = "";
   
    $rows = CS50::query("SELECT * FROM business WHERE name LIKE (?) OR bus_type LIKE (?) AND zip = ?", $_GET["id"] . "%", $_GET["id"] .  "%", $_GET["zip"]);
    
    $busSearch = [];
    
    if ($rows == FALSE)
    {
       render("no_found.php", ["title" => "No Results"]);
    }
    else
    {
    foreach ($rows as $row)
    {
        $busSearch[] = [
                "name" => $row["name"],
                "address" => $row["address"],
                "city" => $row["city"],
                "state" => $row["state"],
                "zip" => $row["zip"],
                "bus_id" => $row["bus_id"],
                "bus_type" => $row["bus_type"]
                ]; 
    }
    }
    
    $_SESSION["prev_page"] = "/search.php?id=" . $_GET["id"] . "&zip=" . $_GET["zip"];
    
        render("search_view.php", ["busSearch" => $busSearch, "title" => "Search Results"]);

    
    
    ?>