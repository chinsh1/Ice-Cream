<?php
$con = mysqli_connect("localhost", "chinsh", "swiftbrain55", "chinsh_icecream");
include 'connection.php';
//link to connection page

/* Order Query*/
/* SELECT OrderID, CustomerID FROM orders*/

/* Flavours Query*/
/* SELECT FlavourID, Name FROM flavours */
$all_flavours_query = 'SELECT FlavourID, Name, Cost, Stock FROM flavours';
$all_flavours_result = mysqli_query($con, $all_flavours_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- title of page in link-->
    <title> Ice Cream </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<header>
    <!-- title of page -->
    <h1> Ice Cream </h1>
</header>

<nav>
    <!-- links to other pages -->
    <a href="index.php"> home </a>
    <a href="flavours.php"> flavours </a>
    <a href="order.php"> order </a>
</nav>

<main>
    <!-- using a form to insert an entry into the database -->
    <h2>Add Customer</h2>
    <form action="insertcustomer.php" method="post">
        <!-- enter first name -->
        <label for="FName">First Name: </label><br>
        <input type="text" id="FName" name="FName"><br>
        <!-- enter last name -->
        <label for="LName">Last Name: </label><br>
        <input type="text" id="LName" name="LName"><br>
        <!-- enter address -->
        <label for="Address">Address: </label><br>
        <input type="text" id="Address" name="Address"><br>
        <!-- enter phone number -->
        <label for="Phone">Phone Number: </label><br>
        <input type="text" id="Phone" name="Phone"><br>
        <!-- enter email address -->
        <label for="Email">Email: </label><br>
        <input type="text" id="Email" name="Email"><br>
        <!-- submit button-->
        <input type="submit" value="submit">
    </form>


    <!--
    <label for="cost">Cost:</label><br>
    <input type="text" id="cost" name="cost"><br>
    -->
    <h2>Add Order</h2>
    <form action="insertorder.php" method="post">

        <!-- enter customer ID -->
        <label for="CustomerID">Customer ID: </label><br>
        <input type="text" id="CustomerID" name="CustomerID"><br>

        <!-- enter Flavour ID -->
        <label for="flavour">Flavour: </label><br>
        <select id="flavour" name="flavour">
            <!--options-->
            <?php
            while($all_flavours_record = mysqli_fetch_assoc($all_flavours_result)) {
                echo "<option value = '". $all_flavours_record['FlavourID'] . "'>";
                echo $all_flavours_record['Name'];
                echo "</option>";
            }
            ?>
        </select><br>


        <!-- enter quantity  -->
        <label for="Quantity">Quantity: </label><br>
        <input type="text" id="Quantity" name="Quantity"><br>

        <!-- submit button-->
        <input type="submit" value="submit">

    </form>

</main>
