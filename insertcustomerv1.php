<?php
$con = mysqli_connect("localhost", "chinsh", "swiftbrain55", "chinsh_icecream");
include 'connection.php';

/* Insert into customers table query */
$FName = $_POST['FName'];
$LName = $_POST['LName'];
$Address = $_POST['Address'];
$Phone = $_POST['Phone'];
$Email = $_POST['Email'];


$insert_customer = "INSERT INTO customers (FName, LName, Address, Phone, Email) 
            VALUES('$FName', '$LName', '$Address', '$Phone', '$Email')";

/* Check the data has been inserted */
if(!mysqli_query($con, $insert_customer))
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
