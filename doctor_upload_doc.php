<?php
  require "functions/db.php";
  require "functions/users.php";

if (isset($_POST['appoint_id']) && is_numeric($_POST['appoint_id'])) 
	   $appoint_id = $_POST['appoint_id'];
else
{
	echo 'Invalid Mobile number';
	exit();
}   
    $userid = getUserIdFromAppointId($appoint_id, $conn);	
  
    $email = getEmailFromUserId($userid, $conn);	
    if ($_FILES["fileToUpload"]["size"] > 10000000) {
    echo "Sorry, max. file size is 10 MB";
    exit();
    }		
    
    if(!$email)	
    {echo 'Invalid Email / Mobile number';
    exit();
    }	
    else	
    {	
    $file_path = "docs/" . $email . '/reports/' ;
    
    $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
    
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path) ){
        echo "success";
    } else{
        echo "fail";
    }
    }
 ?>