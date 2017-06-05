<?php
  require "functions/db.php";
  require "functions/users.php";
  
  if(is_numeric($_POST['hospital_id']))
  $result = getDepartmentFromHospital($_POST['hospital_id'], $conn);
  else
  {echo 'Hospital does not exist';
  exit();}

  echo json_encode($result);
  
  //while($row = $res->fetch_array(MYSQL_ASSOC)) 
    //        $myArray[] = $row;
  //echo json_encode($myArray);          
            

?>	