<?php
  include_once '../connect.php';

  $year = 2022;
  $sum = 0;
if (isset($_GET['year'])) {
  $year = $_GET['year'];
}

  
?>
<!doctype html>
<html>
<head>
	<title>e-Vehicle Service Report <?php echo $year?></title>
  <link rel="stylesheet" type="text/css" href="../print.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Month', 'Total of Service'],
            <?php 
              $querytype = "SELECT COUNT(Service_No) as total, MONTHNAME(Service_Date) as month FROM service WHERE YEAR(Service_Date) = '$year' GROUP BY MONTH(Service_Date)";
              $rstype = mysqli_query($conn, $querytype);

              while ($rowtype = mysqli_fetch_array($rstype)) { 
                $sum += $rowtype["total"];
            ?>
            ["<?php echo $rowtype['month'] ?>", <?php echo $rowtype["total"] ?>],

        <?php } ?>
          ]);

          var options = {
            chart: {
              title: 'Total of Services: <?php echo $sum?>',
              subtitle: 'Year: <?php echo $year?>',
            },
            bars: 'vertical', // Required for Material Bar Charts.
            hAxis: {format: 'integer'},
            height: 430,
            width: 590,
            colors: ['#49e2ff', '#CCCCCC']
          };

          var chart = new google.charts.Bar(document.getElementById('chart'));

          chart.draw(data, google.charts.Bar.convertOptions(options));

        }

        // $(document).ready(function() {
        //   window.print();
        // });
      </script>
</head>

<div class="row">
	
<p align="center">
  <img src='../image/jatanegara.png' height='62px' width='77px' align="center"></img> &nbsp; 
  <img src='../image/logo.png' height='62' width='125' align="center"></img> &nbsp; 
  <img src='../image/ftmk.png' height='68' width='135' align="center"></img> &nbsp;
</p>	
<table width="850" height="133" border="0" align="center">
	  <tbody>
	    <tr>
	      <td></td>
			<td width="640"><h3 align="center" style="font-size: 18px;"><strong>VEHICLE SERVICE REPORT</strong></h3>       
				<h3 align="center" style="font-size: 18px;"><strong>UNIVERSITI TEKNIKAL MALAYSIA MELAKA</strong><br></h3>
        <h3 align="center"  id="year_report" style="font-size: 18px;"><strong>YEAR : <?php echo $year?></strong><br></h3>
	      <td width="110"></img><span class="card-header"></span></td>
        </tr>
  </tbody>
</table>
<br>

<content>
    <center>
    <br><br>
      
      <div id="chart" style="font-size: 12px; width: 78%; height: 500px;border: 1px solid gray; padding: 20px;text-align: left;"></div>
    
    <br><br>
  </center>
</content>



<p align="center"><strong>This is a computer generated report, no signature required</strong></p>

</div>

</head>
</html>
<?php
?>