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
                    <th width="23%">Destination</th>
                    <th width="21%">Reason</th>
                    <th width="21%">Trip Date</th>
                    <th width="17%">Booking Status</th>
                    <th width="3%"></th>
                </tr>   

				<?php

				$counter = 1;
				$sql="SELECT * FROM booking where Staff_ID = '$row[Staff_ID]' order by Book_Date desc ";
				$result_set=mysqli_query($conn,$sql);

				if ($result_set-> num_rows == 0)  
				{
					echo "<font size='3'>Maaf, Tiada Permohonan Yang Telah Dibuat.</font>";
				}

				else {

				
                
            

				While($row1=mysqli_fetch_array($result_set))
				{ ?>
                <tr class="tbody">
					<td><?php echo $counter; ?></td>

                    <td><?php echo date("d/m/Y", strtotime($row1['Book_Date'])); ?></td>
                    
                    <td><?php echo $row1['Destination'] ?></td>
					
					<td><?php echo $row1['Reason'] ?></td>
                    
                    <td><?php echo date("d/m/Y", strtotime(date($row1['DateTime_Out'])))?> - <?php echo date("d/m/Y", strtotime(date($row1['DateTime_In']))) ?></td>

                    <td><font color="red"><?php echo $row1['Book_Status'] ?></font></td>
					
					<td><a href="view_booking.php?id=<?php echo $row1['Book_No'];?>" class="a-icon"><i class="fa fa-arrow-right w3-large"></i></a></td>
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