<?php
$con = mysqli_connect("localhost", "chinsh", "swiftbrain55", "chinsh_icecream");
include 'connection.php';
//link to connection page

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
    <!-- grid container for home page  -->
    <div class="grid-container">
        <div class="grid-item-1">
            <header>
                <?php
                echo "<a class = 'title' href='index.php'>";
                ?>
                <!-- title of page -->
                <h1> Ice Cream </h1>
            </header>
        </div>

        <!-- div for nav bar  -->
        <div class="grid-item-2">
            <nav>
                <!-- links to other pages -->
                <a class="nav-bar" href="index.php">HOME</a>
                <a class="nav-bar" href="flavours.php">FLAVOURS</a>
                <a class="nav-bar" href="order.php">ORDER</a>
            </nav>
        </div>

        <!-- div for information -->
        <div class = "grid-items grid-item-3">
            <h2> About Us</h2>
            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
            aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
            <!-- when shop is open -->
            <h2> Open Hours </h2>
            <b>Monday</b> - 12:00pm - 9:00pm <br>
            <b>Tuesday</b> - CLOSED <br>
            <b>Wednesday</b> - 12:00pm - 9:00pm <br>
            <b>Thursday</b> - 12:00pm - 12:00am <br>
            <b>Friday</b> - 12:00pm - 12:00am <br>
            <b>Saturday</b> - 12:00pm - 12:00am <br>
            <b>Sunday</b> - 12:00pm - 12:00am <br>
        </div>

        <div class = "grid-items grid-item-11">
            <?php
            echo "<img src='https://live.staticflickr.com/7134/7560180616_c1a580bcff_b.jpg' width='771px' height='571px' alt='Ice Cream Truck'/>";
            ?>
        </div>

    <!-- div for footer -->
    <div class = "grid-item-4">
        <footer>
            CONTACT US @ <br>
            No Scream Ice Cream :) | 0220962340 | noscream@yahoo.com
        </footer>
    </div>
</div>
</body>
