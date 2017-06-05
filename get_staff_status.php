<?php
  require "functions/db.php";
  require "functions/users.php";
  if (isset($_POST['date']) && is_numeric($_POST['staff_id'])) 
	    {$date = $_POST['date'];
	    $staff_id = $_POST['staff_id'];}
else
{
	echo 'Doctor does not exist.';
	exit();
}	
 
 
  echo check_staff_busy($staff_id, $date);
  	
  
            

?>	