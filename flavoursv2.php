<?php
include 'connection.php';
$con = mysqli_connect("localhost", "chinsh", "swiftbrain55", "chinsh_icecream");
//link to connection page

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
    <!-- search bar for all food -->
    <h2>Search a Item</h2>
    <form action="flavours.php" method="post">
        <input type="text" name='search'>
        <input type="submit" name="submit" value="go!">
    </form>
    <!-- php for search bar -->
    <?php

    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        // query to find item that is searched from database
        $query1 = "SELECT * FROM flavours WHERE Name LIKE '%$search%'";
        $query = mysqli_query($con, $query1);
        $count = mysqli_num_rows($query);
        //if input is invalid it will print this message
        if ($count == 0) {
            echo "<p> There was no search results!";
        } else {

            while ($row = mysqli_fetch_array($query)) {
                echo "<br>";
                echo $row ['Name'];
            }
        }
    }
    ?>
    <!-- button that shows all flavours in alphabetical order asc-->
    <form action="flavours.php" method="post" class="button">
        <input type='submit' name='allflavoursquery' value="All Flavours">
    </form>

    <?php
    if (isset($_POST['allflavoursquery'])) {
    // query that prints by ID number
        $result = mysqli_query($con, "SELECT * FROM `flavours` ORDER BY `flavours`.`Name` ASC");
        if (mysqli_num_rows($result) != 0) {
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>FLAVOUR ID</th>";
            echo "<th>FLAVOUR</th>";
            echo "<th>COST </th>";
            echo "<th>STOCK</th>";
            echo "</tr>";
            echo "</thead>";
            while ($test = mysqli_fetch_array($result)) {
                $id = $test['FlavourID'];
                //titles of each column
                echo "<tr>";
                echo "<td>" . $test['FlavourID'] . "</td>";
                echo "<td>" . $test['Name'] . "</td>";
                echo "<td>" . $test['Cost'] . "</td>";
                echo "<td>" . $test['Stock'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>

</main>
