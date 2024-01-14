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
    <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
 		$(document).ready(function(){

            load_data();

            function load_data(dateto, datefrom)
            {
            	var to = $('#dateTo').val();
            	var from = $('#dateFrom').val();
        
                $.ajax({
                  url:"ajax_feedback.php",
                  method:"GET",
                  data:{to:to, from:from},
                  success:function(data)
                  {
                    $('#feedback').html(data);
                  }
                });
            }

            $('#search').click(function(){
            	var to = $('#dateTo').val();
            	var from = $('#dateFrom').val();
            	
                if(to != '' && from != '')
                {
                  load_data(to, from);
                }
                else
                {
                  load_data();
                }
             });
      });
</script>

  
</head>

<body>

<center>
<content>
	<center>
    <div class="title">
			<h2><b>Feedback Record</b></h2><hr>
		</div>

		<div class="form" style="margin-left: 70px; float: left;width: 60%; font-size: 12px;text-align: right;">
			<label>View Feedback From : </label>
	  		<input type="date" name="dateFrom" id="dateFrom" style="width: 25%" required>
			<label> To : </label>
	  		<input type="date" name="dateTo" id="dateTo" style="width: 25%" required><br>			     
		</div>
		<div style="float: right;text-align: left; margin-right:280px;margin-top: 20px;">
        	<button type="button" class="btn" id="search" style="width: 90px; height: 40px">Search</button>
    </div>

      	<br><br><br>
	
		<div class="div-table" id="feedback">
            
		</div>
		<br>
    </center>
</content>
</center>

<center>

</center>

</body>
<?php
  include("../footer.php");
  ?>
</html>