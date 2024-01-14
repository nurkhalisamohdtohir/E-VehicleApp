<!DOCTYPE html>
<html>
<head>
	<title>e-Vehicle</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  
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
            <div class="yellowcard">
                <a href="user_list.php">
                    <div class="yellowcard-up">
                        <div class="yellowcard-icon">
                            <i class="fa fa-user w3-jumbo"></i>
                        </div>
                        <div class="yellowcard-text">
                            MANAGE USER
                        </div>
                    </div>
                    <div class="yellowcard-down">
                        <div class="yellowcard-text-down">
                            See More
                        </div>
                        <div class="yellowcard-icon-down">
                            <i class="w3-margin-left fa fa-arrow-right"></i>
                        </div>
                    </div> 
                </a>
            </div>
            <br>

            <div class="greencard">
                <a href="category_list.php">
                    <div class="greencard-up">
                        <div class="greencard-icon">
                            <i class="fa fa-check-square-o w3-jumbo"></i>
                        </div>
                        <div class="greencard-text">
                            MANAGE CATEGORY
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
				<a href="vehicle_list.php">
                    <div class="bluecard-up">
                    	<div class="bluecard-icon">
                    		<i class="fa fa-car w3-jumbo"></i>
                    	</div>
                    	<div class="bluecard-text">
                			MANAGE VEHICLE
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
                <a href="service_list.php">
                    <div class="redcard-up">
                    	<div class="redcard-icon">
                    		<i class="fa fa-wrench w3-jumbo"></i>
                    	</div>
                    	<div class="redcard-text">
                			MANAGE SERVICE
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