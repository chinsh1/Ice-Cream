<?php
$con = mysqli_connect("localhost", "chinsh", "swiftbrain55", "chinsh_icecream");
include 'connection.php';
/* Insert into orders table query */
$CustomerID = $_POST['CustomerID'];
$flavour = $_POST['flavour'];
$Quantity = $_POST['Quantity'];



$insert_order = "INSERT INTO orders (CustomerID, flavour, Quantity) VALUES('$CustomerID', '$flavour', '$Quantity')";

/* Check the data has been inserted */
if(!mysqli_query($con, $insert_order))
{
    echo 'Insert Failed';
}
else
{
    echo 'Insert Successful';
}
/* Refresh the page after 2 seconds and return to the drinks.php page */
header("refresh:2; url=order.php");

?>
