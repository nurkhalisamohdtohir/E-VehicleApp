<?php 
//ajax_catname.php
include('../connect.php');
$display = '';
$cat_no = 0;
$num = 0;
$loop = 1;
$dateTo = '';
$dateFrom = '';
$book_no = $_GET['bookno'];

if(isset($_GET['num']) && strlen($_GET['dateTo']) != 0 && strlen($_GET['dateFrom']) != 0) {
   $num = $_GET['num'];
   $Date_In = date("Y-d-m", strtotime($_GET['dateTo']));
   $Date_Out = date("Y-d-m", strtotime($_GET['dateFrom']));


$query1 ="SELECT * FROM vehicle INNER JOIN vehiclecat ON vehicle.Cat_No = vehiclecat.Cat_No INNER JOIN trip ON vehicle.Vehicle_Plate = trip.Vehicle_Plate WHERE Book_No = '$book_no'";
$result1 = mysqli_query($conn, $query1);


$query2 ="SELECT    vehiclecat.Cat_No, Cat_Name
         FROM      vehicle
         INNER JOIN vehiclecat
         ON vehicle.Cat_No = vehiclecat.Cat_No
         WHERE 
         Vehicle_Plate NOT IN (
                     SELECT    Vehicle_Plate
                     FROM      trip
                     INNER JOIN booking
                     ON trip.Book_No = booking.Book_No
                     WHERE   (( Date_Out BETWEEN '$Date_Out' AND '$Date_In' ) 
                  OR       ( Date_In BETWEEN '$Date_Out' AND '$Date_In' ) 
                  OR       ( Date_Out <= '$Date_Out' AND Date_In >= '$Date_In' )
                  OR       ( Date_Out > '$Date_Out' AND Date_In < '$Date_In' ))
                     AND      booking.Book_No != '$book_no'
                  )
         GROUP BY Cat_Name";




$display .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
         <script>
         $("#table_vehicle").ready(function() {
            
            $("#table_vehicle").on("change", "#catname",function() {
               var curr = $(this).closest("tr");
               var loopno = curr.find("td:eq(0)").html();
               var bookno = parseInt($("#bookno").val());
               var dateFrom = $("#dateFrom").val();
               var dateTo = $("#dateTo").val();
               var catno = $(this).val();

                  $.ajax({
                     type: "GET",
                     url: "ajax_model.php",
                     data: {catno:catno, dateFrom:dateFrom, dateTo:dateTo, bookno:bookno,},
                     success: function(data){
                        curr.find("td:eq(2) select").html(data);
                     }
                  });
            });
            $("#table_vehicle").on("change ", "#model",function() {
               var curr = $(this).closest("tr");
               var loopno = curr.find("td:eq(0)").html();
               var bookno = parseInt($("#bookno").val());
               var dateFrom = $("#dateFrom").val();
               var dateTo = $("#dateTo").val();
               var model = $(this).val();

                  $.ajax({
                     type: "GET",
                     url: "ajax_plate.php",
                     data: {model:model, dateFrom:dateFrom, dateTo:dateTo, bookno:bookno,},
                     success: function(data){
                        curr.find("td:eq(3) select").html(data);
                     }
                  });
            });
         });
            
         </script>      

         <input type = "hidden" id="bookno" value = "'.$book_no.'">  
         <input type = "hidden" id="dateFrom" value = "'.$Date_Out.'">  
         <input type = "hidden" id="dateTo" value = "'.$Date_In.'">  

         <table class="table-kend" id="table_vehicle">
            <tr class="thead-kend">
               <th>No.</th>
               <th>Vehicle Type</th>
               <th>Model</th>
               <th>Plate No.</th>
            </tr>';

while ($row1 = mysqli_fetch_array($result1)) {
   
   $display .= '<tr class="tbody-kend">
               <td id="loopno">'.$loop.'</td>
               <td>
                  <select name = "catname'.$loop.'" id = "catname">';

            $result2 = mysqli_query($conn, $query2);
            while ($row2 = mysqli_fetch_array($result2)) {
               if ($row1['Cat_No'] == $row2['Cat_No']) {
                  $display .= '<option value = "'.$row2['Cat_No'].'" selected>'.$row2['Cat_Name'].'</option>'; 
               }
               else {
                  $display .= '<option value = "'.$row2['Cat_No'].'">'.$row2['Cat_Name'].'</option>';
               }              
            };
            $result2->close();
                     
   $display .= '     </select>
               </td>
               <td>
                  <select name = "model'.$loop.'" id = "model">';
                     
   $display .= '     </select>
               </td>
               <td>
                  <select name = "plate'.$loop.'" id = "plate">
                     
                  </select>
               </td>
            </tr>';

   $loop++; 
};

$display .= '</table>';

$result1->close();

}
echo $display;
?>