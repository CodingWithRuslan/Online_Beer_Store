![image](https://github.com/user-attachments/assets/69a1fb4b-903f-40f8-b986-81d8a8e61c1c)
![image](https://github.com/user-attachments/assets/ef702065-60b3-47dd-91e1-2b5353bd1f59)

index.php :
<?php
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your username
$password = "mysql"; // Replace with your password
$dbname = "beerstore"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch beer data
$sql = "SELECT * FROM beersExtended";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beer Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <?php
        $counter = 0;
        while ($row = $result->fetch_assoc()) {
            if ($counter % 4 == 0) {
                if ($counter != 0) {
                    echo '</div>';
                }
                echo '<div class="row">';
            }
            ?>
            <div class="beer-box">
                <img src="<?php echo htmlspecialchars($row['beer_image']); ?>" alt="<?php echo htmlspecialchars($row['brand']); ?>">
                <h2><?php echo htmlspecialchars($row['brand']); ?></h2>
                <p><strong>Alcohol Percentage:</strong> <?php echo htmlspecialchars($row['alcohol_percentage']); ?>%</p>
                <p><strong>Volume:</strong> <?php echo htmlspecialchars($row['beer_ml']); ?> ml</p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($row['description']); ?></p>
                <p><strong>Price:</strong> $<?php echo htmlspecialchars($row['price']); ?></p>
                <p><strong>Country of Origin:</strong> <?php echo htmlspecialchars($row['country_of_origin']); ?></p>
            </div>
            <?php
            $counter++;
        }
        if ($counter % 4 != 0) {
            echo '</div>';
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
style.css :
/* Reset some default styles */
body, h2, p {
    margin: 0;
    padding: 0;
}

/* Container for rows */
.container {
    width: 90%;
    margin: 0 auto;
}

/* Row styling */
.row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 20px;
}

/* Individual beer box styling */
.beer-box {
    flex: 1 1 calc(25% - 20px); /* 4 boxes per row with gap accounted for */
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    background-color: #fff;
    padding: 15px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.beer-box img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 10px;
}

.beer-box h2 {
    font-size: 1.2em;
    margin-bottom: 10px;
}

.beer-box p {
    margin-bottom: 8px;
    color: #333;
}

