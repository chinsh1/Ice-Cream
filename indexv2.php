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
<div class="grid-container">
    <div class="grid-items grid-item-1">
        <header>
            <!-- title of page -->
            <h1> Ice Cream </h1>
        </header>
    </div>

    <div class="grid-items grid-item-2">
        <nav>
            <!-- links to other pages -->
            <a class="nav-bar" href="index.php">HOME</a>
            <a class="nav-bar" href="flavours.php">FLAVOURS</a>
            <a class="nav-bar" href="order.php">ORDER</a>
        </nav>
    </div>

    <div class = "grid-items grid-item-3">
        <main>
            <h2> About Us</h2>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
                aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
            </p>

            <!-- when shop is open -->
            <h2> Open Hours </h2>
            <p> open 24/7</p>
    </div>
    </main>

    <div class = "grid-items grid-item-4">
        <footer>
            2022 No Scream Ice Cream - Shayla Chin
        </footer>
    </div>
</div>
</body>
