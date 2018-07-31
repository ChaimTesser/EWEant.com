<?php

        require("../includes/config.php");
        
        if ($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $reviews = CS50::query("SELECT * FROM good WHERE id = ? ORDER BY timeOrder DESC", $_SESSION["id"]);
            
            $rev = [];
            
            $count = 0;
            
            foreach ($reviews as $review)
            {
                $rev[] = [
                    "flag" => $review["flag"],
                    "reviewId" => $review["timeOrder"],
                    "info" => $review["info"],
                    "timeDate" => $review["timeDate"],
                    "first" => $review["first"],
                    "lastInt" => $review["lastInt"]
                    ];
                
                $count += 1;
            }
        
        render("review_view.php", ["rev" => $rev, "title" => "Reviews", "count" => $count]);
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $flags = $_POST["flag"];
            
            $n = count($flags);
            
            foreach ($_POST["flag"] as $select)
            {
                
                $flag = CS50::query("SELECT flag FROM good WHERE timeOrder = ?", $select);
                
                if ($flag[0]["flag"] == NULL)
                {
                
                CS50::query("UPDATE good SET flag = 1 WHERE timeOrder = ?",  $select);   
                
                }
                else 
                {
                    
                CS50::query("UPDATE good SET flag = NULL WHERE timeOrder = ?",  $select);   
    
                }
            }
            redirect("/reviews.php");
        }
?>