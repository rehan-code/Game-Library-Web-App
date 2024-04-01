<?php
/**
 * Database page
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */

/**
 * Function gets cyber all cyber coin questions for a stage
 * 
 * @param $stage_num of the stage the user is in
 * 
 * @return array of array of quest, options and answer
 */
function getCyberQuestions($stage_num)
{
    include 'database_cred.php';
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
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($table, $row);
        }
    }

    mysqli_close($conn);
    return $table;
}

/**
 * Function to get the cyber coin leaderboard
 * 
 * @return array of leaderboard entries
 */
function getCyberLeaderboardDB() 
{
    include 'database_cred.php';
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        return [];
        // die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connection successful\n";

    $sql = "SELECT name, points FROM cyber_leaderboard 
    ORDER BY points DESC
    LIMIT 5;";
    $result = mysqli_query($conn, $sql);

    $table = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($table, $row);
            // echo " - Name: " . $row["name"]. " " . $row["points"]. "<br>";
        }
    }

    mysqli_close($conn);
    return $table;
}

getCyberLeaderboardDB();

/**
 * Function to add user to leader board
 * 
 * @param $name   name of the user 
 * @param $points points of the user 
 * 
 * @return boolean success or failure when adding the new user
 */
function addUserToLeaderboard($name, $points) 
{
    include 'database_cred.php';
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        return false;
        // die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO cyber_leaderboard (name, points)
    VALUES ('$name', $points);";
    if (!mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return false;
    }

    mysqli_close($conn);
    return true;
}
?>