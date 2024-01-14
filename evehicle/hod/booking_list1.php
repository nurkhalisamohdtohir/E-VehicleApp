<?php
  	include("header.php");
	include_once '../connect.php';
	$query ="SELECT * FROM User WHERE Staff_ID='$login_session'";
	$result=mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Vehicle</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

 	<script>
		function save() {
		    var ask = confirm("Are you sure to update this booking?");
		    if (ask == true) {
		        return true;
		    }
		    else {
		    	return false;
		    }
		}
		
		$(function() {

			$("#button_cancel").click(function(e) {

				var ask = confirm("Warning : This action cannot retrieve back the booking information! \n Are you sure to cancel this booking?");

				if (ask == true) {
					e.preventDefault();
			  		var book_no = $("#book_no").val(); 

					  $.ajax({
						    type:'POST',
						    data: {book_no:book_no},
						    url:'cancel_booking.php',

						    success:function(data) {
						      window.location.href = "booking_list1.php";
						      alert(data);
						    }
					  });
				}
			  	
			});

        	$('#status').ready(function() {

        		if ($("#status").val() == "PROCESSING") {

        			
        		}
        		
        		else {
        			$('#form input').attr('readonly', 'readonly');
        			$('#form select').attr('disabled', 'disabled');
        			//$('#button_save').attr('hidden', 'hidden');
        		}
        	});
        

        	Date.prototype.yyyymmdd = function () {
	            var dd = this.getDate().toString();
	            var mm = (this.getMonth() + 1).toString();
	            var yyyy = this.getFullYear().toString();
	            return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]);
		    };


	        $('#dateFrom').change(function() {
	        	var startDate = $('#dateFrom').val();
				var today = new Date().yyyymmdd();
				var endDate = $('#dateTo').val();

				if (startDate < today) {
					alert('Invalid selected date! Please try again.');
					$("#dateFrom").attr( "value", $("#date1").val());
				}

				else if (startDate > endDate) {
					alert('Please change the return date.');
					$('#dateTo').focus();
					$('#dateTo').attr( "value", "");
				}
	        });


	       	$('#dateTo').change(function() {
	        	var endDate = $('#dateTo').val();
	        	var startDate = $('#dateFrom').val();
				var today = new Date().yyyymmdd();

				if (today > endDate || startDate > endDate) {
					alert('Invalid selected date! Please try again.');
					$("#dateTo").attr( "value", $("#date2").val());
				}

	        });


        	$('#num_psg, #dateFrom, #dateTo').change(function() {

        		var num = parseInt($('#num_psg').val());
        		var dateFrom = $('#dateFrom').val();
        		var dateTo = $('#dateTo').val();

        		if (num > 0) {

        			$('#prefer').prop('disabled', false);
					var html = '';

					$.ajax({
						type: 'GET',
						url: 'ajax_passenger.php',
						data: {num:num, dateFrom:dateFrom, dateTo:dateTo},
						success: function(data){
							$("#prefer").html(data);
						}
					});
        		}

        		else if (num == 0 || num == null) {
        			$('#prefer').prop('disabled', true);
        			$("#prefer").attr( "value", "");
        		}
        	});

        	$('#filter').on('click', function() 
		  	{
			    $('.bg-modal').addClass('bg-modal-visible');	
			});

			$('.bg-modal').on('click', function(e) {
			    e.preventDefault();
			    console.log($(e.target));
			    if ($(e.target).is('.fa-close') || $(e.target).is('.bg-modal')) {
			      $('.bg-modal').removeClass('bg-modal-visible');
			    }
			});

			// $('.bg-modal').ready(function() {
			//     var html = '';

			// 	$.ajax({
					
			// 		url: 'ajax_show_filter.php',
			// 		data: {},
			// 		success: function(data){
			// 			$("#show_filter").html(data);
			// 		}
			// 	});

			// });

        });

        $(document).ready(function(){

		 	load_data();

		 	function load_data(query)
		 	{
		 		var id = $('#id').val();

		  		$.ajax({
			   		url:"ajax_booking.php",
			   		method:"GET",
			   		data:{query:query, id:id},
			   		success:function(data)
			   		{
			    		$('#table-booking').html(data);
			   		}
		  		});
		 	}

		 	$('#search_text').keyup(function(){
		  		var search = $(this).val();
		  		if(search != '')
		  		{
		   			load_data(search);
		  		}
		  		else
		  		{
		   			load_data();
		  		}
			 });
		});

	</script>
</head>

<body>



<center>


<content>
	<center>
    <div class="title">
			<h2><b>Booking Application</b></h2><hr>
		</div>
		<input type="hidden" id="id" value="<?php echo $row['Staff_ID']?>">
		<div class="form-search">
			<input type="text" name="search_kp" id="search_text" placeholder="Search..">
<!-- 			<button style="float: left; width: 14%; margin-top: 8px;" type="submit" class="btn-search" id="filter"><i class="fa fa-sliders w3-xlarge"></i></button>
 -->	</div>

		<div class="div-table" id="table-booking">
            
		</div>
		<br>
    </center>
</content>



</center>
</body>
<div>
<?php
  include("../footer.php");
  ?>	
</div>

</html>