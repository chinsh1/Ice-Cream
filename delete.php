<?php
$con = mysqli_connect("localhost", "chinsh", "swiftbrain55", "chinsh_icecream");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

/* Update drink and cost query */
$delete_order = "DELETE FROM order WHERE OrderID='$_GET[OrderID]'";

/* Check the record has been deleted */
if(!mysqli_query($con, $delete_order)) {
    echo 'Delete Failed';
} else {
    echo 'Delete Successful';
}

/* Refresh the page and redirect */
header("refresh:2; url=order.php");
?>
