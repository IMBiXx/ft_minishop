<?php
$servername = "localhost:3306";
$username = "toto";
$password = "toto";
$db = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $test);

// Check connection
if (mysqli_connect_error()) {
	die("Database connection failed: " . mysqli_connect_error());
}
echo "Connected successfully\n";
$sql = "USE test";
if ($conn->query($sql) === TRUE) {
	echo "Successfully connected to database\n";
} else {
	echo "Error trying to connect to database: " . $conn->error . "\n";
}
$sql = "CREATE TABLE MyGuests (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";
	
	if ($conn->query($sql) === TRUE) {
		echo "Table MyGuests created successfully\n";
	} else {
		echo "Error creating table: " . $conn->error . "\n";
	}
$conn->close();
?>
