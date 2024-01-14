<?php
include '../connect.php';
$counter = 1;
$search = '';
$to = '';
$from = '';
$id = $_GET['id'];
$output = '';
$query = "";
$fb = '';



if( strlen($_GET['to']) != 0 && strlen($_GET['from']) != 0)  
{

  $to = $_GET['to'];
  $from = $_GET['from'];

  $query = "SELECT * FROM booking where Staff_ID = '$id' AND Date_In BETWEEN '$from' AND '$to' order by Book_Date desc "; 
 
}

else
{
 
   $query = "SELECT * FROM booking where Staff_ID = '$id' AND Date_In < date(SYSDATE()) order by Book_Date desc "; 
}

$result = mysqli_query($conn, $query);


if(mysqli_num_rows($result) > 0)
{
   $output .= '
              <table class= "table-semak">
                <tr class="thead">
                    <th width="2%">No.</th>
                    <th width="13%">Date of Booking</th>
                    <th width="23%">Destination</th>
                    <th width="21%">Reason</th>
                    <th width="20%">Trip Date</th>
                    <th width="15%">Booking Status</th>
                    <th width="3%"></th>
                    <th width="3%"></th>
                </tr>   
   '; 

   while($row1 = mysqli_fetch_array($result))
   {

    $output .= '
        <tr class="tbody">
          <td>'. $counter .'</td>

          <td>'. date("d/m/Y", strtotime( $row1['Book_Date'] )) .'</td>
                    
          <td>'. $row1['Destination'] .'</td>
          
          <td>'. $row1['Reason'] .'</td>
                    
          <td>'. date("d/m/Y", strtotime(date($row1['Date_Out']))).' - '. date("d/m/Y", strtotime(date($row1['Date_In']))) .'</td>

          <td><font color="red">'. $row1['Book_Status'] .'</font></td>
          
          <td>
            <a href="view_booking_history.php?id='.$row1['Book_No'].'" class="a-icon"><i class="fa fa-arrow-right w3-large"></i></a>
          </td>

          <td> ';
          
          $queryfb ="SELECT COUNT(*) AS total FROM feedback 
          INNER JOIN trip ON feedback.Trip_No = trip.Trip_No 
          INNER JOIN booking ON trip.Book_No = booking.Book_No
          WHERE booking.Book_No = ". $row1['Book_No'];
          $resultfb=mysqli_query($conn, $queryfb);
          $rowfb = mysqli_fetch_array($resultfb);

          if ($row1['Book_Status'] == 'APPROVED' && $rowfb['total'] == 0) { 
              $output .= '<a href="feedback_form.php?id='. $row1['Book_No'] .'" class="a-icon"><i class="fa fa-check-square w3-large"></i></a>';
          } 

    $output .= '</td>
        </tr> ';
         
            $counter++;
          
        }


   echo $output;
}

else
{
 echo '<br><br><br><br>No Record Found';
}

?>
