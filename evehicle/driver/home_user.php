<!DOCTYPE html>
<html>
<head>
    <title>e-Vehicle</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <link type="text/css" rel="Stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/start/jquery-ui.css" />

    <script type="text/javascript">
        // $( function() {
            
        //     $('#ongoing').click(function() {

        //         var driver = $('#driver').val();
        //          var html = '';

        //         $.ajax({
        //                     type: 'GET',
        //                     url: 'ajax_ongoing.php',
        //                     data: {driver:driver},
        //                     success: function(data){
        //                         if (data == 0) {
        //                             alert("Sorry, you have no ongoing trip at this time");
        //                         }
        //                         else{
        //                             window.location.href='ongoing_trip.php'
        //                         }
        //                     }
        //         });
        //     });
        // });
    </script>
</head>

<body>
<?php
include 'header.php';
include_once '../connect.php';
$query ="SELECT * FROM User WHERE Staff_ID='$login_session'";
$result=mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>

<center>
<content>
    <center>
        <div class="title">
            <h2><b>Dashboard</b></h2><hr>
        </div>
        <input type="hidden" name="driver" id="driver" value="<?php echo $row['Staff_ID']?>" >
        <div class="row">
            <div class="greencard">
                <a href="incoming_trip.php">
                    <div class="greencard-up">
                        <div class="greencard-icon">
                            <i class="fa fa-car w3-jumbo"></i>
                        </div>
                        <div class="greencard-text">
                            INCOMING TRIP
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
                <a href="ongoing_trip.php" id="ongoing">
                    <div class="bluecard-up">
                        <div class="bluecard-icon">
                            <i class="fa fa-tachometer w3-jumbo"></i>
                        </div>
                        <div class="bluecard-text">
                            ONGOING TRIP
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
                <a href="completed_trip.php">
                    <div class="redcard-up">
                        <div class="redcard-icon">
                            <i class="fa fa-reorder w3-jumbo"></i>
                        </div>
                        <div class="redcard-text">
                            COMPLETED TRIP
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
            <br>
            <br>
       
            
            <br>

            
               
        </div><br></center>

</content></center>
</body>
<?php
  include("../footer.php");
  ?>
</html>