<!DOCTYPE html>
<html>
<head>
	<title>e-Vehicle</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  
</head>

<body>
<?php
  include("header.php");
  include_once '../connect.php';

?>

<center>
<content>
	<center>
		<div class="title">
			<h2><b>Dashboard</b></h2><hr>
		</div>
		
		<div class="row">
            <div class="greencard">
                <a href="form_book_vehicle.php">
                    <div class="greencard-up">
                        <div class="greencard-icon">
                            <i class="fa fa-car w3-jumbo"></i>
                        </div>
                        <div class="greencard-text">
                            BOOK VEHICLE
                        </div>
                    </div>
                    <div class="greencard-down">
                        <div class="greencard-text-down">
                            See More
                        </div>
                        <div class="greencard-icon-down">
                            <i class="w3-margin-left fa fa-arrow-right"></i>
                        </div>
                    </div> 
                </a>
            </div>
            <br>

            <div class="bluecard">
				<a href="booking_list1.php">
                    <div class="bluecard-up">
                    	<div class="bluecard-icon">
                    		<i class="fa fa-check-square-o w3-jumbo"></i>
                    	</div>
                    	<div class="bluecard-text">
                			BOOKING STATUS
                		</div>
                    </div>
                    <div class="bluecard-down">
                        <div class="bluecard-text-down">
                			See more
                		</div>
                		<div class="bluecard-icon-down">
                			<i class="fa fa-arrow-right"></i>
                		</div>
                    </div> 
                </a>
			</div>
            
            <br>
            <div class="redcard">
                <a href="booking_history.php">
                    <div class="redcard-up">
                    	<div class="redcard-icon">
                    		<i class="fa fa-reorder w3-jumbo"></i>
                    	</div>
                    	<div class="redcard-text">
                			BOOKING HISTORY
                		</div>
                    </div>
                    <div class="redcard-down">
                        <div class="redcard-text-down">
                			See More
                		</div>
                		<div class="redcard-icon-down">
                			<i class="fa fa-arrow-right"></i>
                		</div>
                    </div> 
                </a>
            </div>
               
        </div><br></center>

</content></center>
</body>
<?php
  include("../footer.php");
  ?>
</html>