<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beer Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Welcome to the Beer Store</h1>
    </header>
    <main>
        <div class="beer-container">
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
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="beer-card">';
                    echo '<img src="' . $row['beer_image'] . '" alt="' . $row['beer_name'] . '" class="beer-image">';
                    echo '<h2 class="beer-name">' . $row['beer_name'] . '</h2>';
                    echo '<p class="beer-price">$' . number_format($row['beer_price'], 2) . '</p>';
                    echo '</div>';
                }
            } else {
                echo "<p>No beers found</p>";
            }

            // Close connection
            $connection->close();
            ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Beer Store. All rights reserved.</p>
    </footer>
</body>
</html>
