<?php
/**
 * I-spot stage 2
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
    <title>Where's Waldo Game</title>
    <style>
        <?php require 'waldo_game.css'; ?>
    </style>
</head>

<body>
    <?php require "../../components/navbar/navbar.php"; ?>

    <div class="main-heading">
        <h1>Find the Skull Shirt Girl!</h1>
    </div>

    <!-- Full-Screen Toggle Button -->
    <button class="fullscreen-toggle">Toggle Full Screen</button>

    <div class="game-over-screen">
        <h1>Game Over</h1>
        <div class="options">
            <button class="option-button button1" 
            onclick="window.location.href='../../index.php'"></button>
            <button class="option-button button2" 
            onclick="window.location.href='waldo_stage_3.php'"></button>
        </div>
        <div class="other-stages-text">
            <h1>Other stages available to play:</h1>
        </div>
        <div class="movie-cards-container">
            <div class="movie-card movie-card-1" 
            onclick="window.location.href='waldo_stage_1.php';">
                <h1 class="main-heading">
                Forest
                </h1>
            </div>
            <div class="movie-card movie-card-2" 
            onclick="window.location.href='waldo_stage_2.php';">
                <h1 class="main-heading">
                Kingdom
                </h1>
            </div>
        </div>
    </div>

    <div class="image-container">
        <img src="../../images/waldo/waldo_stage_3.jpg" draggable="false" 
        alt="Zoomable Image" id="waldoImage">
        <button class="found-button-3"></button>
    </div>

    <div class="scoreboard">
        <h2>Lives: <span class="score">10</span></h2>
    </div>

    <script>
        <?php require 'waldo_game.js'; ?>
    </script>
</body>

</html>