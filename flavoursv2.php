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

<div class="grid-container-2">
    <div class="grid-item-1">
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

    <div class="grid-item-8"
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
    </div>

        <div class="grid-item-9"
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
                    echo "<th class='idColumn'>FLAVOUR ID</th>";
                    echo "<th class='flavourColumn'>FLAVOUR</th>";
                    echo "<th class='costColumn'>COST </th>";
                    echo "<th class='stockColumn'>STOCK</th>";
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
        </div>
    <div class = "grid-items grid-item-4">
        <footer>
            2022 No Scream Ice Cream - Shayla Chin
        </footer>
    </div>
</main>
</body>
</html>
</div>
