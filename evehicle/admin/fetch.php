<?php
include '../connect.php'; // MySQL
echo "<script>alert('helo')</script>";
if (isset($_POST["bookno"])) {
    $query  = "SELECT * FROM booking INNER JOIN trip ON booking.Book_No = trip.Book_No WHERE booking.Book_No = '" . $_POST["bookno"] . "'";
    $result = mysqli_query($connect, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);
}
?>