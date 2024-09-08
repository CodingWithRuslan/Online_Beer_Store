# RB-Beer-Shop
![image](https://github.com/user-attachments/assets/a2d485a4-7650-47ce-bbfd-e2a4d7b460e0)
![image](https://github.com/user-attachments/assets/04fe1f03-0cf3-46c5-9a06-b5e5b99ebe77)
![image](https://github.com/user-attachments/assets/c6640bb4-4a26-4aea-94d1-09d29d2b6991)
![image](https://github.com/user-attachments/assets/afa6a23a-553b-403e-9d5b-8a8c209eca3b)
![image](https://github.com/user-attachments/assets/b194f8be-d192-4a38-84e7-ffa431249b52)
![image](https://github.com/user-attachments/assets/15bae5ab-9100-43b2-bdca-e1b9cef15204)



online beer store project built using Ampps : Apache, MySQL and PHP. 

Step 1: Install AMPPS
Download and install AMPPS on your Windows machine from AMPPS website.
Start AMPPS and run Apache and MySQL services.
Step 2: Create a MySQL Database
Open phpMyAdmin (http://localhost/phpmyadmin/).
Create a new database called beerstore.
Inside the beerstore database, create a table beers with these columns:
beer_id (INT, Primary Key, AUTO_INCREMENT)
beer_name (VARCHAR(50))
beer_price (DECIMAL(5,2))

CREATE TABLE beers (
    beer_id INT AUTO_INCREMENT PRIMARY KEY,
    beer_name VARCHAR(50),
    beer_price DECIMAL(5,2)
);

Step 2: Update the Sample Data
Now, update your beer entries with the image file paths:

beer_name	beer_price	beer_image
Heineken	5.99	/images for beerstore/heineken.jpg
Corona	4.99	/images for beerstore/corona.jpg


ALTER TABLE beers ADD beer_image VARCHAR(100);

Step 3: Modify the PHP Code to Display Images
Update your index.php to include the images:
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

Step 5: View Your Updated Beer Store
Go to http://localhost/beerstore/ and you'll see the beers listed with their images.
Step 3: Create a PHP File to Display Beers
Inside your AMPPS folder, go to C:/Program Files (x86)/Ampps/www/.
Create a folder beerstore, and inside it, create a file called index.php.
Write this basic PHP code to connect to the database and display beers:

Step 1: Adjust Image Paths in the Database
You need to use web-accessible paths. Update your image paths in the database to be relative to the server root. Change the paths like this:

beer_image
/images for beerstore/heineken.jpg
/images for beerstore/corona.jpg
