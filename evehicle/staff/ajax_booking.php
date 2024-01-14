<?php
$connect = mysqli_connect("localhost", "root", "", "evehicle");
$counter = 1;
$search = '';

// $query ="SELECT * FROM User WHERE Staff_ID='$login_session'";
// $result=mysqli_query($conn, $query);
// $row = mysqli_fetch_array($result);
$output = '';
$id = $_GET["id"];

if(isset($_GET["query"]))  
{

   $search = mysqli_real_escape_string($connect, $_GET["query"]);
   $datesearch = date("Y-d-m", strtotime($search));
   
   $query = "SELECT * FROM booking where Staff_ID = '$id' AND Date_In >= date(SYSDATE())
              AND (Book_Date LIKE '%".$search."%'
              OR Destination LIKE '%".$search."%'
              OR Reason LIKE '%".$search."%'
              OR Date_Out LIKE '%".$search."%'
              OR Date_In LIKE '%".$search."%'
              OR Book_Status LIKE '%".$search."%')
              ORDER BY Book_Date desc";
}

else
{
   $query = "SELECT * FROM booking where Staff_ID = '$id' AND Date_In >= date(SYSDATE()) order by Book_Date desc";
}

$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
   $output .= '
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
   '; 

   while($row1 = mysqli_fetch_array($result))
   {
   
    $output .= '
     <tr class="tbody">
                    <td hidden="true" id="sini">'.$row1['Book_No'].'</td>

                    <td>'.$counter .'</td>

                    <td>'. date("d/m/Y", strtotime($row1['Book_Date'])) .'</td>
                    
                    <td>'. $row1['Destination'] .'</td>
          
                    <td>'. $row1['Reason'] .' </td>
                    
                    <td>'. date("d/m/Y", strtotime(date($row1['Date_Out']))).' - '. date("d/m/Y", strtotime(date($row1['Date_In']))) .'</td>

                    <td><font color="red">'. $row1['Book_Status'] .'</font></td>
          
          <td><a href="view_booking.php?id='. $row1['Book_No'] .'" class="a-icon"><i class="fa fa-arrow-right w3-large"></i></a></td>
        </tr>
          
        
    ';
    $counter++;
   }
   echo $output;
}

else
{
 echo '<br><br><br>No Record Found';
}

?>
