<?php
if(isset($_GET['Height'])&&isset($_GET['UUID']))
{
$db_name="avayahackathon";
$mysql_user="avayahackathon";
$mysql_pass="avayahackathon";
$server_name="avayahackathon";
$conn=new mysqli($server_name,$mysql_user,$mysql_pass,$db_name);


$UUID=$_GET["UUID"];

$query1="SELECT * FROM health_one WHERE Height='".$Height."' and UUID= '".$UUID."'";
$result1=mysqli_query($conn,$query1);
$output1=array();
$row1=mysqli_fetch_assoc($result1);
$output1=$row1;


$query2="SELECT * FROM health_two WHERE Height= ".$Height." and UUID= ".$UUID;
$result2=$conn->query($query2);
$output2=array();
$row2=mysqli_fetch_assoc($result2);
$output2=$row2;


$query3="SELECT * FROM reports WHERE Height= ".$Height." and UUID= ".$UUID;
$result3=$conn->query($query3);
$output3=array();
$row3=mysqli_fetch_assoc($result3);
$output3=$row3;


$query4="SELECT * FROM basic WHERE Height= '".$Height."' and UUID= '".$UUID."'";
$result4=$conn->query($query4);
$output4=array();
$row4=mysqli_fetch_assoc($result4);
$output4=$row4;


$final=array("health_one"=>$output1,"health_two"=>$output2,"reports"=>$output3,"basic"=>$output4);
echo json_encode($final,JSON_UNESCAPED_SLASHES);
}
?>
