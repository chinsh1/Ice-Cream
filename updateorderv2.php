<?php
$con = mysqli_connect("localhost", "chinsh", "swiftbrain55", "chinsh_icecream");
include 'connection.php';

$update_order = "UPDATE orders SET CustomerID='$_POST[CustomerID]',Flavour = '$_POST[FlavourID]', 
                  Quantity='$_POST[Quantity]', WHERE OrderID='$_POST[OrderID]'";

/* Check the data has been updated */
if(!mysqli_query($con, $update_order))
{
    echo 'Update Failed';
}
else
{
    echo 'Update Successful';
}
/* Refresh the page after 2 seconds and return to the order.php page */
header("refresh:2; url=order.php");
?>
