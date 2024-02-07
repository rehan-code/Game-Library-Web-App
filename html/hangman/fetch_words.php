<?php
// Connect to MySQL
$servername = "localhost";
$dbname = "cis4250";

// Create connection
$conn = new mysqli($servername, null, null);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql_create_db = "CREATE DATABASE IF NOT EXISTS cis4250";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the database
$conn->select_db($dbname);

// Create the cs_words table if it doesn't exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS cs_words (
    id INT AUTO_INCREMENT PRIMARY KEY,
    word VARCHAR(255) NOT NULL
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "Table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Read words from JSON file
$json_file = '../data/cs_words.json';
$json_data = file_get_contents($json_file);
$words = json_decode($json_data, true)['words'];

// Prepare a SQL statement for inserting data
$stmt = $conn->prepare("INSERT INTO cs_words (word) VALUES (?)");

// Bind parameters and execute the statement for each word
foreach ($words as $word) {
    // Bind parameters to the statement
    $stmt->bind_param("s", $word);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Word inserted successfully: " . $word . "<br>";
    } else {
        echo "Error inserting word: " . $conn->error;
    }
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();
?>
