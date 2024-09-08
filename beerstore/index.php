<?php
// Connect to MySQL
$connection = new mysqli('localhost', 'root', 'mysql', 'beerstore');

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Query to get beers
$result = $connection->query("SELECT * FROM beers");

// Display beers
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Beer: " . $row['beer_name'] . " - Price: $" . $row['beer_price'] . "<br>";
        echo "<img src='" . $row['beer_image'] . "' alt='" . $row['beer_name'] . "' width='150'><br><br>";
    }
} else {
    echo "No beers found";
}

// Close connection
$connection->close();
?>
