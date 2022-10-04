<?php
$con = mysqli_connect("localhost", "chinsh", "swiftbrain55", "chinsh_icecream");
include 'connection.php';

/* Insert into customers table query */
$FName = $_POST['FName']; /* first name  */
$LName = $_POST['LName']; /* last name */
$Address = $_POST['Address']; /* address */
$Phone = $_POST['Phone']; /* phone number */
$Email = $_POST['Email']; /* email address */

/* query to insert customers information  */
$insert_customer = "INSERT INTO customers (FName, LName, Address, Phone, Email) 
            VALUES('$FName', '$LName', '$Address', '$Phone', '$Email')";

/* Check the data has been inserted */
if(!mysqli_query($con, $insert_customer))
{
    /* if insert failed */
    echo 'Insert Failed';
}
else
{
    /* if insert is successful */
    echo 'Insert Successful';

}
/* Refresh the page after 2 seconds and return to the drinks.php page */
/*  echo .$row['CustomerID'].; */
header("refresh:2; url=order.php");

?>
