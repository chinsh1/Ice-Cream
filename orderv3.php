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

/* Customers Query */
/* Select CustomerID, FName, Email FROM customers */
$all_customers_query = 'SELECT CustomerID, FName, Email FROM customers';
$all_customers_result = mysqli_query($con, $all_customers_query);
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
    <!-- container for order and flavours page -->
    <div class="grid-container-2">
        <div class="grid-item-1">
            <header>
                <!-- link to home page -->
                <?php
                echo "<a class = 'title' href='index.php'>";
                ?>
                <!-- title of page -->
                <h1> Ice Cream </h1>
            </header>
        </div>

        <!-- div for nav bar -->
        <div class="grid-item-2">
            <nav>
                <!-- links to other pages -->
                <a class="nav-bar" href="index.php">HOME</a>
                <a class="nav-bar" href="flavours.php">FLAVOURS</a>
                <a class="nav-bar" href="order.php">ORDER</a>
            </nav>
        </div>

        <!-- div for add customer  -->
        <div class="grid-items grid-item-5">
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
                <input type="Submit" value="Submit">
            </form>
        </div>

        <!-- div for add order  -->
        <div class="grid-items grid-item-6">
            <h2>Add Order</h2>
            <!-- allows user to add a new order  -->
            <form action="insertorder.php" method="post">
                <!-- enter first name -->
                <label for="CustomerID">Customer ID: </label><br>
                <input type="text" id="CustomerID" name="CustomerID"><br>
                <!-- enter last name -->
                <label for="FlavourID">Flavour ID: </label><br>
                <input type="text" id="FlavourID" name="FlavourID"><br>
                <!-- enter address -->
                <label for="Quantity">Quantity: </label><br>
                <input type="text" id="Quantity" name="Quantity"><br>
                <input type="Submit" value="Submit">
            </form>
        </div>

        <!-- div for updating order  -->
        <div class="grid-items grid-item-7">
            <h2>Update Order</h2>

            <table class="order-table">
                <tr>
                    <th>Customer ID</th>
                    <th>Flavour ID</th>
                    <th>Quantity</th>
                </tr>
                <!-- updating order table -->
                <?php
                while($row = mysqli_fetch_array($update_orders_record))
                {
                    echo"<tr><form action = update.php method = post>";
                    /* user changes the customer ID of order */
                    echo"<td><input type=text name=CustomerID value='" .$row['CustomerID']. "'></td>";
                    /* user changes the flavour ID of order */
                    echo"<td><input type=text name=FlavourID value='" .$row['FlavourID']. "'></td>";
                    /* user changes the quantity of the order  */
                    echo"<td><input type=text name=Quantity value='" .$row['Quantity']. "'>";
                    echo"<td><input type=hidden name=OrderID value='" .$row['OrderID']. "'></td>";
                    /* button to submit  */
                    echo"<td><input type = Submit></td>";
                    /* delete order button */
                    echo"<td><a class='delete' href=delete.php?OrderID=" .$row['OrderID']. ">Delete</a></td>";
                    echo"</form></tr>";
                }

                ?>

            </table>
        </div>

        <div class="grid-item-12">
            <!-- Customers Information -->
            <h2>Customer Information</h2>
            <table>
                <tr>
                    <th>Customer ID</th>
                    <th>First Name</th>
                    <th>Email</th>
                </tr>
                <?php
                while($row = mysqli_fetch_array($all_customers_result))
                {
                    //table that displays some customer Information
                    echo"<tr>";
                    echo"<td class='customer'> " .$row['CustomerID']. "</td>";
                    echo"<td class='customer'>" .$row['FName']. "</td>";
                    echo"<td class='customer'>" .$row['Email']. "</td>";
                    echo"</tr>";
                }
                ?>

            </table>
        </div>

            <!-- div for footer  -->
            <div class = "grid-item-10">
                <footer>
                    CONTACT US @ <br>
                    No Scream Ice Cream :) | 0220962340 | noscream@yahoo.com
                </footer>
            </div>
    </div>
</body>
</html>
