
<?php
    include("header.php");
    include_once '../connect.php';
    $query ="SELECT * FROM User WHERE Staff_ID='$login_session'";
    $result=mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
  <title>e-Vehicle</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

<script type="text/javascript">

      $(document).ready(function(){

            $('#print').click(function(){
                var year = $('#year').val();
                window.open('report_service_print.php?year='+year);
              
            });
      });

</script>
<script type="text/javascript">

function show()
{

  var select = document.getElementById('year');
  var option = select.options[select.selectedIndex];

  if (option.value == 2021)
  {
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart2021);

      function drawChart2021() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Total of Services'],
          <?php
          $sum = 0;

            $querytype = "SELECT COUNT(Service_No) as total, MONTHNAME(Service_Date) as month FROM service WHERE YEAR(Service_Date) = 2021 GROUP BY MONTH(Service_Date)";
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
            subtitle: 'Year: 2021',
          },
          bars: 'vertical', // Required for Material Bar Charts.
          hAxis: {format: 'integer'},
          height: 400,
          colors: ['#49e2ff', '#CCCCCC']
        };

        var chart = new google.charts.Bar(document.getElementById('chart'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

      }
  }
  else
  {
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart2022);

      function drawChart2022() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Total of Services'],
          <?php 
          $sum = 0;

            $querytype = "SELECT COUNT(Service_No) as total, MONTHNAME(Service_Date) as month FROM service WHERE YEAR(Service_Date) = 2022 GROUP BY MONTH(Service_Date)";
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
            subtitle: 'Year: 2022',
          },
          bars: 'vertical', // Required for Material Bar Charts.
          hAxis: {format: 'integer'},
          height: 400,
          colors: ['#49e2ff', '#CCCCCC']
        };

        var chart = new google.charts.Bar(document.getElementById('chart'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

      }
  }

}

</script>
 
</head>

<body onload="show()">

<center>
<content>
  <center>
    <div class="title">
      <h2><b>Vehicle Maintenance Report</b></h2><hr>
    </div>

  <div style="background-color: black; width: 100%">
      <div class="form-search" style="width: 30%; margin-left: 90px; float: left;">
      <label><b>Year of Report: </b></label>
      <select class="prefer" style="width: 50%" id="year" onchange="show()">
        <option value="2022" selected>2022</option>
        <option value="2021">2021</option>
      </select>
      </div>
      <div style="float: right; margin-right: 110px;margin-top: 10px;">
        <button id = "print" type="button" class="btn" style="width: 100px">Print</button>
      </div>
  </div>

  <br><br><br>
  <div id="chart" style="font-size: 12px; width: 80%; height: 500px;"></div>
  
  </center>
</content>
</center>
</body>
<?php
  include("../footer.php");
  ?>
</html>