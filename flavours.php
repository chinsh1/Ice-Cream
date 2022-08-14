<?php
include 'connection.php';
$con = mysqli_connect("localhost", "chinsh", "swiftbrain55", "chinsh_icecream");
//link to connection page

/* Flavours Query*/
/* SELECT FlavourID, Name FROM flavours */
$all_flavours_query = 'SELECT FlavourID, Name FROM flavours';
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
    <!-- flavours form -->
    <form name="flavours_form" id="flavours_form" method="get" action="flavours.php">
        <select id="flavour" name="flavour">
            <!--options-->
            <?php
            while($all_flavours_record = mysqli_fetch_assoc($all_flavours_result)) {
                echo "<option value = '". $all_flavours_record['FlavourID'] . "'>";
                echo $all_flavours_record['Name'];
                echo "</option>";
            }
            ?>
        </select>
        <input type="submit" name="flavour_button" value="Show me the flavours">
    </form>
</main>
