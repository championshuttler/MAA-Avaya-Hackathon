<?php
  require "functions/db.php";
  require "functions/users.php";
  
  $sql = "SELECT hospital_id, hospital_name, address FROM hospital ";

  $res = mysqli_query($conn, $sql); 
  //$row = $res -> fetch_assoc();
  //echo json_encode($row);
  
  while($row = $res->fetch_array(MYSQL_ASSOC)) 
            $myArray[] = $row;
  echo json_encode($myArray);          
            

?>	