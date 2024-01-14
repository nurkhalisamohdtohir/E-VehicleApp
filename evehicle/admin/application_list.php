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
    $query ="SELECT * FROM User WHERE Staff_ID='$login_session'";
    $result=mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
?>

<center>
<content>
	<center>
    <div class="title">
			<h2><b>Vehicle Booking List</b></h2><hr>
		</div>

		<div class="div-table">
            <table class= "table-semak">
                <tr class="thead">
					<th width="2%">No.</th>
                    <th width="13%">Date of Booking</th>
                    <th width="21%">Staff Name</th>
                    <th width="21%">Destination</th>
                    <th width="16%">Reason</th>
                    <th width="13%">Trip Date</th>
                    <th width="13%">Booking Status</th>
                    <th width="3%"></th>
                </tr>   

				<?php

				$counter = 1;
				$sql="SELECT * FROM booking INNER JOIN user ON booking.Staff_ID = user.Staff_ID INNER JOIN trip ON booking.Book_No = trip.Book_No WHERE Book_Status = 'PROCESSING' GROUP BY trip.Book_No ORDER BY booking.Book_Date ";
				$result_set=mysqli_query($conn,$sql);

				if ($result_set-> num_rows == 0)  
				{
					echo "<font size='3'>Sorry, there is no booking made at this time.</font>";
				}

				else {


				While($row1=mysqli_fetch_array($result_set))
				{ ?>
                <tr class="tbody">
					<td><?php echo $counter; ?></td>

                    <td><?php echo date("d/m/Y", strtotime($row1['Book_Date'])); ?></td>

                    <td><?php echo $row1['Staff_Name'] ?></td>
                    
                    <td><?php echo $row1['Destination'] ?></td>
					
					<td><?php echo $row1['Reason'] ?></td>
                    
                    <td><?php echo date("d/m/Y", strtotime(date($row1['Date_Out'])))?> - <?php echo date("d/m/Y", strtotime(date($row1['Date_In']))) ?></td>

                    <td><font color="red"><?php echo $row1['Book_Status'] ?></font></td>
					
					<td><a href="view_application.php?id=<?php echo $row1['Book_No'];?>" class="a-icon"><i class="fa fa-arrow-right w3-large"></i></a></td>
				</tr>
					<?php
						$counter++;
					} 
				}

					?> 
								
            </table>
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