<?php
/**
 * Secret Page screen
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to the Secret Page</title>
    <style>
        <?php require './congrats.css'; ?>
    </style>
</head>

<body>
    <?php require "../../components/navbar/navbar.php"; ?>
    <div class="container">
        <img src="../../images/cryptogram/reward.png" alt="reward" class="image-size">
        <h1>Congratulations!</h1>
        <p>You have solved the mystery cryptogram puzzle.</p>
        <p>Feel free to click below to go the next website.</p>
        <button class="Button" onclick = "window.location.href='https://www.google.ca/';">
            <span class="Button-inner">
                Next Website
            </span>
        </button>
    </div>
</body>

</html>
