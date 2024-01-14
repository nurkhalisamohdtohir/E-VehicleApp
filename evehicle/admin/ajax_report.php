<?php 

require_once('../connect.php');
$createTable = '';
$year = '2022';
$sum = 0;

if(isset($_GET['query'])) {
	$year = $_GET['query'];
}

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          var data = google.visualization.arrayToDataTable([
            ['Vehicle Type', 'Percentage of Preference'],

            <?php 
              $querytype = "SELECT Cat_Name, COUNT(booking.Prefer_Cat_No) AS total FROM booking 
							INNER JOIN vehiclecat ON booking.Prefer_Cat_No = vehiclecat.Cat_No
							WHERE YEAR(Book_Date) = '$year'
							GROUP BY Prefer_Cat_No";
              $rstype = mysqli_query($conn, $querytype);

              while ($rowtype = mysqli_fetch_array($rstype)) { 
            ?>

            ["<?php echo $rowtype['Cat_Name'] ?>", <?php echo $rowtype["total"] ?>],

              
            <?php 
              } 
            ?>
          ]);

          var options = {
            title: 'Vehicle Type Preference'
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

          chart.draw(data, options);
        }
      </script>

       <script type="text/javascript">

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          var data = google.visualization.arrayToDataTable([
            ['Vehicle Type', 'Percentage of Preference'],

            <?php 
              $querytype = "SELECT Cat_Name, COUNT(booking.Prefer_Cat_No) AS total FROM booking 
              INNER JOIN vehiclecat ON booking.Prefer_Cat_No = vehiclecat.Cat_No
              WHERE YEAR(Book_Date) = '$year'
              GROUP BY Prefer_Cat_No";
              $rstype = mysqli_query($conn, $querytype);

              while ($rowtype = mysqli_fetch_array($rstype)) { 
            ?>

            ["<?php echo $rowtype['Cat_Name'] ?>", <?php echo $rowtype["total"] ?>],

              
            <?php 
              } 
            ?>
          ]);

          var options = {
            title: 'Vehicle Type Preference'
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

          chart.draw(data, options);
        }
      </script>
      

<?php

	echo '<div style="padding-bottom: 200px ; width: 80%">
  		<div id="piechart" style="float: left; width: 48%; height: 300px;border: 1px solid gray"></div>
  		<div id="donutchart" style="float: right; width: 48%; height: 300px; border: 1px solid gray"></div>
	  	</div>
	  	<br><br><br><br>
	  	<div id="chart_div" style="font-size: 12px; width: 80%; height: 500px;border: 1px solid gray; padding: 20px"></div>';
?>    