<?php
include '../connect.php';
$counter = 1;
$search = '';
$to = '';
$from = '';
$output = '';

if( strlen($_GET['to']) != 0 && strlen($_GET['from']) != 0)  
{
  $to = $_GET['to'];
  $from = $_GET['from'];

   $query = "SELECT * FROM feedback INNER JOIN trip ON feedback.Trip_No = trip.Trip_No
            INNER JOIN booking ON trip.Book_No = booking.Book_No 
            WHERE MONTH(Date_In) between '$from' and '$to'";
}

else
{
   $query = "SELECT * FROM feedback INNER JOIN trip ON feedback.Trip_No = trip.Trip_No
            INNER JOIN booking ON trip.Book_No = booking.Book_No 
            WHERE MONTH(Date_In) = MONTH(SYSDATE())";
}

$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
   $output .= '
              <table class= "table-semak" style="width: 70%">
                <tr class="thead">
                    <th width="5%">No.</th>
                    <th width="25%">Trip No.</th>
                    <th width="10%">Punctuality</th>
                    <th width="10%">Vehicle Condition</th>
                    <th width="10%">Drivers Attitude</th>
                    <th width="30%">Comment</th>
                </tr>   
   '; 

   while($row1 = mysqli_fetch_array($result))
   {
   
    $output .= '
        <tr class="tbody">
          <td>'.$counter .'</td>
          <td>'. $row1['Trip_No'] .'</td>
          <td>'. $row1['Feedback_Time'] .'</td>
          <td>'. $row1['Feedback_Vehicle'] .'</td>
          <td>'. $row1['Feedback_Driver'] .'</td>
          <td><font color="red">'. $row1['Comment'] .'</font></td>
        </tr> ';

    $counter++;
   }
   echo $output;
}

else
{
 echo '<br><br><br>No Record Found';
}

?>
