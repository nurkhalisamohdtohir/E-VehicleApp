<?php
    include("header.php");
    include_once '../connect.php';
    $query ="SELECT * FROM User WHERE Staff_ID='$login_session'";
    $result=mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $id = $row['Staff_ID'];
    $to = '';
    $from = '';
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

	            function load_data(to, from)
	            {
	            	var to = $('#to').val();
	            	var from = $('#from').val();
	            	var id = $('#staffid').val();
	        		
	                $.ajax({
	                  url:"ajax_history.php",
	                  method:"GET",
	                  data:{to:to, from:from, id:id},
	                  success:function(data)
	                  {
	                    $('#history').html(data);
	                  }
	                });
	            }

	            $('#search').click(function(){
	            	var to = $('#to').val();
	            	var from = $('#from').val();
	            	
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
			<h2><b>Booking Application History</b></h2><hr>
	</div>

		<div class="form" style="margin-left: 70px; float: left;width: 60%; font-size: 12px;text-align: right;">
			<label>View Booking From : </label>
	  		<input type="date" name="from" id="from" style="width: 25%" required>
			<label> To : </label>
	  		<input type="date" name="to" id="to" style="width: 25%" required><br>
	  		<input type="hidden" name="staffid" id="staffid" value="<?php echo $id; ?>"><br>	
	
		</div>
		<div style="float: right;text-align: left; margin-right:335px;margin-top: 20px;">
			<button type="button" class="btn" id="search" style="width: 40px; height: 40px" title="Search"><i class="fa fa-search w3-large" title="Search"></i></button>
    	</div>

		<div class="div-table" id="history">
            
		</div>
		<br>
    </center>
</content>
</center>
</body>
<?php
  include("../footer.php");
  ?>
</html>