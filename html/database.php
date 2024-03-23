<?php
/**
 * Database page
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */

  $servername = "db";
  $username = "root";
  $password = "rootpassword";
  $dbname = "myDB";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  echo "Connection successful";

  // Create database
  // $sql = "CREATE DATABASE myDB";
  // if ($conn->query($sql) === TRUE) {
  //   echo "Database created successfully";
  // } else {
  //   echo "Error creating database: " . $conn->error;
  // }

  // sql to create table
  $sql = "CREATE TABLE MyGuests (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  
  if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  // $sql = "SELECT id, firstname, lastname FROM MyGuests";
  // $result = mysqli_query($conn, $sql);

  // if (mysqli_num_rows($result) > 0) {
  //   // output data of each row
  //   while($row = mysqli_fetch_assoc($result)) {
  //     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  //   }
  // } else {
  //   echo "0 results";
  // }

  mysqli_close($conn);
?>