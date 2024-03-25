<?php
/**
 * Database page
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */

  function getCyberQuestions($stage_num) {
    require 'database_cred.php';
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      return [];
      // die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connection successful\n";
    

    $sql = "SELECT * FROM cyber_question WHERE stage_num={$stage_num}";
    $result = mysqli_query($conn, $sql);
    $table = [];

    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        array_push($table, $row);
        // echo "id: " . $row["id"]. " - Question: " . $row["question"]. " " . "<br>";
      }
    } 
    // else {
    //   echo "0 results";
    // }

    mysqli_close($conn);
    return $table;
  }
  // getCyberQuestions(3);
?>