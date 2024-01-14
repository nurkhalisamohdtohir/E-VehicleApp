<?php
    require_once "conn.php";
	
	$Staff_ID='51446';
	

	$sql_book_no = "SELECT * FROM booking INNER JOIN trip ON booking.Book_No = trip.Book_No
					INNER JOIN job_desc ON trip.Trip_No = job_desc.Trip_No 
					WHERE job_desc.Staff_ID = '$Staff_ID' AND job_desc = 'DRIVER' AND Book_Status = 'APPROVED'";
    
	$result_book_no=mysqli_query($conn,$sql_book_no);
	
	
    if($result_book_no) {
		if($result_book_no->num_rows > 0)
		{
	        echo "book_no present...."."<br>";
			
			echo"print dataa..."."<br>";
					
			while ($row=mysqli_fetch_assoc($result_book_no)) 
			{
				echo "book no: " .$row["Book_No"]. " - Date In: " .$row["Date_In"].
						" - Date out: " .$row["Date_Out"]. " -Time in : " .$row["Time_In"].
						" -Destination : " .$row["Destination"]. "<br>";
					
			}
			echo "done print....."."<br>";
		}
			
		else 
		{
			echo "fail to print booking details...."."<br>";
		}
	}
	
    else {
        // If no record is found, print "failure"
        echo "failure";
    } 
	

	
?>