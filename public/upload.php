 <?php
 
 
    require("../includes/config.php");
 // If Everything is good- process the form - write the data into the database


    //photo upload starts
        $errors=0;
        if($_FILES['image']){
        $image=$_FILES['image']['name'];
        if($image) {
        define ("MAX_SIZE","10000"); 
        function getExtension($str) {   
        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext; }


        //reads the name of the file the user submitted for uploading
        $image=$_FILES['image']['name'];                                   
        //if it is not empty
        if ($image) 
        {                               
        //get the original name of the file from the clients machine
        $filename = stripslashes($_FILES['image']['name']);
        //get the extension of the file in a lower case format
                                $extension = getExtension($filename);
                                $extension = strtolower($extension);
                                //if it is not a known extension, we will suppose it is an error and will not  upload the file,  
                                //otherwise we will do more tests
                                if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
                                {           
                                //print error message
                                $msg="Sorry! Unknown extension. Please JPG,JPEG,PNG and GIF only ";
                                $errors=1;

                                }
                                else
                                {
                                //get the size of the image in bytes
                                //$_FILES['image']['tmp_name'] is the temporary filename of the file
                                //in which the uploaded file was stored on the server
                                $size=filesize($_FILES['image']['tmp_name']);                              
                                //compare the size with the maxim size we defined and print error if bigger
                                if ($size < MAX_SIZE*1024)
                                {
                                //we will give an unique name, for example the time in unix time format
                                $image_name=time().'.'.$extension;
                                //the new name will be containing the full path where will be stored (images folder)                                                        
                                $newname="uploads/".$image_name;                                                     
                                //we verify if the image has been uploaded, and print error instead                                                     
                                $copied = copy($_FILES['image']['tmp_name'], $newname);                                                        
                                if (!$copied)                                                       
                                {                                                       
                                $msg="Sorry, The Photo Upload was unsuccessfull!";                                                          
                                $errors=1;                                                          
                                }                                                         
                                }                                               
                                else                                            
                                {       
                                $msg="You Have Exceeded The Photo Size Limit";          
                                $errors=1;                              
                                }                                           
                                }}}                                           

                                /*Image upload process ends here- If any problem occurs it will display error message via the $msg, 
                                 otherwise it will upload the image to the image folder. To insert the photo into database $image_name has been used*/ 

        }


                    if(($_FILES['image'])&& ($errors))/* If any photo is selected and any problem occurs while uploading it will
                                                                display an error message, otherwise transfer the data to Mod_addstudent model  */
                                        { 

                                echo $msg;


                                        }

                    else        {   

                                    //Insert into database.Just use this particular variable "$image_name" when you are inserting into database
                                   // $fileinfo = "/uploads/$"
                                    CS50::query("UPDATE business SET pic = ? WHERE user_id = ?", $image_name, $_SESSION["id"]); 

                                             header("location: business.php");
                                             


                                }
                ?>