<!DOCTYPE HTML>
<html>
<?php
require "../functions/db.php";
require "../functions/users.php";



      
 
$user_id=(int)$_GET['user_id'];

$sql = "SELECT * FROM parameter WHERE user_id = '$user_id' ";
$result = $conn->query($sql);

while($row = $result->fetch_assoc())
 	{	unset($row['updation_id'],$row['user_id'],$row['staff_id']);
            $myArray[] = $row;
	}
  

      	
?>
<head>  
  <script type="text/javascript">
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "Health History (<?php echo getNameFromUserId($user_id, $conn); ?>)"
      },
      animationEnabled: true,
      legend: {
        cursor:"pointer",
        itemclick : function(e) {
          if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              e.dataSeries.visible = false;
          }
          else {
              e.dataSeries.visible = true;
          }
          chart.render();
        }
      },
      axisY: {
        title: "Parameters"
      },

      toolTip: {
        shared: true,  
        content: function(e){
          var str = '';
          var total = 0 ;
          var str3;
          var str2 ;
          for (var i = 0; i < e.entries.length; i++){
            var  str1 = "<span style= 'color:"+e.entries[i].dataSeries.color + "'> " + e.entries[i].dataSeries.name + "</span>: <strong>"+  e.entries[i].dataPoint.y + "</strong> <br/>" ; 
            total = e.entries[i].dataPoint.y + total;
            str = str.concat(str1);
          }
          str2 = "<span style = 'color:DodgerBlue; '><strong>"+e.entries[0].dataPoint.label + "</strong></span><br/>";
          str3 = "<span style = 'color:Tomato '>Total: </span><strong>" + total + "</strong><br/>";
          
          return (str2.concat(str)).concat(str3);
        }

      },
       data: [
      <?php
      foreach($myArray as $data_date)
      {	echo '{type: "column",showInLegend: true,color: "#'; echo substr(md5(rand()), 0, 6); echo '" ,name: "'.$data_date["updation_date"] . '" , dataPoints:[' ;
        unset($data_date['updation_date']); 
       	foreach($data_date as $key => $value)
       		echo json_encode(array('y' => (int)$value, 'label' => $key)). ',';
        echo ']},';
      }
      ?>   

      ]
    });

chart.render();
}
</script>
<script type="text/javascript" src="../js/canvasjs.min.js"></script></head>
<body>
  <div id="chartContainer" style="height: 300px; width: 100%;">
  </div>
</body>

</html>