<?php
$con = mysqli_connect("localhost", "chinsh", "swiftbrain55", "chinsh_icecream");
include 'connection.php';
//link to connection page

/* Order Query*/
/* SELECT OrderID, CustomerID FROM orders*/

/* Default value for page */
if(isset($_GET['order'])) {
    $id = $_GET['order'];
} else {
    $id = 1;
}

/* Query the database for a single order */
$this_order_query = "SELECT CustomerID, FlavourID, Quantity  From orders WHERE OrderID = '"  .  $id   .  "'";
$this_order_result = mysqli_query($con, $this_order_query);
$this_order_record = mysqli_fetch_assoc($this_order_result);

/* Update orders query */
$update_orders = "SELECT * FROM orders";
$update_orders_record = mysqli_query($con, $update_orders);

/*SELECT orders.OrderID, customers.FItem, drinks.DItem, specials.Special FROM specials, foods, drinks */
$this_orders_query = "SELECT orders.OrderID, customers.Email, flavours.Name 
FROM orders, customers, flavours 
WHERE customers.CustomerID = orders.CustomerID
AND flavours.FlavourID = orders.FlavourID AND orders.Quantity AND orders.OrderID =  '" . $id . "'";
$this_orders_result = mysqli_query($con, $this_orders_query);
$this_orders_record = mysqli_fetch_assoc($this_orders_result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- title of page in link-->
    <title> Ice Cream </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<div class="grid-container">
    <div class="grid-item-1">
        <body>
        <header>
            <!-- title of page -->
            <h1> Ice Cream </h1>
        </header>
    </div>

    <div class="grid-item-2">
        <nav>
            <!-- links to other pages -->
            <a class="nav-bar" href="index.php">HOME</a>
            <a class="nav-bar" href="flavours.php">FLAVOURS</a>
            <a class="nav-bar" href="order.php">ORDER</a>
        </nav>
    </div>

    <div class="grid-item-5">
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
                <!-- enter password  -->
                <label for="Password">Password: </label><br>
                <input type="text" id="Password" name="Password"><br>
                <!-- submit button-->
                <input type="submit" value="submit">
            </form>
    </div>

        <div class="grid-item-6">
            <h2>Add Order</h2>
            <form action="insertorder.php" method="post">

                <!-- enter customer ID -->
                <label for="CustomerID">Customer ID: </label><br>
                <input type="text" id="CustomerID" name="CustomerID"><br>

                <!-- enter Flavour ID -->
                <label for="flavour">Flavour: </label><br>
                <input type="text" id="FlavourID" name="FlavourID"><br>

                <!-- enter quantity  -->
                <label for="Quantity">Quantity: </label><br>
                <input type="text" id="Quantity" name="Quantity"><br>

                <!-- submit button-->
                <input type="submit" value="submit">

            </form>
        </div>

        <div class="grid-item-7">
            <h2>Update Order</h2>

            <table>
                <tr>
                    <th>Customer ID</th>
                    <th>Flavour ID</th>
                    <th>Quantity</th>
                </tr>
                <?php
                while($row = mysqli_fetch_array($update_orders_record))
                {
                    echo"<tr><form action = update.php method = post>";
                    echo"<td><input type=text name=CustomerID value='" .$row['CustomerID']. "'></td>";
                    echo"<td><input type=text name=FlavourID value='" .$row['FlavourID']. "'></td>";
                    echo"<td><input type=text name=Quantity value='" .$row['Quantity']. "'>";
                    echo"<td><input type=hidden name=OrderID value='" .$row['OrderID']. "'></td>";
                    echo"<td><input type = submit></td>";
                    echo"<td><a class='delete' href=delete.php?OrderID=" .$row['OrderID']. ">Delete</a></td>";
                    echo"</form></tr>";
                }
                ?>

            </table>
            </body>
        </div>
    </main>
    <div class = "grid-items grid-item-4">
        <footer>
            2022 No Scream Ice Cream - Shayla Chin
        </footer>
    </div>
</div>
