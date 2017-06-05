<?php
  require "functions/db.php";
  require "functions/users.php";
  
  if(is_numeric($_POST['mobile']) && is_numeric($_POST['staff_id']))
  $result = makeAppointment(getUserIdFromMobile($_POST['mobile'],$conn),$_POST['staff_id'], $_POST[date]);
  else
  {echo 'Patient/Doctor does not exist';
  exit();}	

  if($result)
  	echo 'Success';
  else
  	echo 'Failure to make an appointment. Please try again.';		  
  //while($row = $res->fetch_array(MYSQL_ASSOC)) 
    //        $myArray[] = $row;
  //echo json_encode($myArray);          
            

?>	