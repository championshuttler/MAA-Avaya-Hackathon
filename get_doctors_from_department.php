<?php
  require "functions/db.php";
  require "functions/users.php";
  
  if(is_numeric($_POST['hospital_id'])&& $_POST['department_id'])
  $result = getDoctorFromDepartment($_POST['department_id'],$_POST['hospital_id'], $conn);
  else
  {echo 'Hospital/Department does not exist';
  exit();}
  if(!$result)
  	echo 'No Doctor found';
  else	
  echo json_encode($result);
  
  //while($row = $res->fetch_array(MYSQL_ASSOC)) 
    //        $myArray[] = $row;
  //echo json_encode($myArray);          
            

?>	