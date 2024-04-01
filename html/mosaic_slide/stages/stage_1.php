<?php
/**
 * Mosaic Slide stage 1 screen
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
    <title>Mosaic Slide</title>
    <style>
        <?php require 'mosaic.css'; ?>
    </style>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script type='module' src="mosaic.js" difficulty='easy'></script>

<body>
    <?php require "../../components/navbar/navbar.php"; ?>
    <h1>Alpine Adventure</h1>
    <h2>Level: Easy</h2>

    <div class="game-over-screen">
        <h1>Game Over</h1>
        <p>Total Turns: <span id="final-turns">0</span></p>
        <div class="options">
            <button class="option-button button1" 
            onclick="window.location.href='../../index.php'"></button>
            <button class="option-button button2" 
            onclick="window.location.href='stage_1.php'"></button>
        </div>
        <div class="other-stages-text">
            <h1>Other levels available to play:</h1>
        </div>
        <div class="movie-cards-container">
            <div class="movie-card movie-card-2" 
            onclick="window.location.href='stage_2.php';">
                <h1 class="main-heading">
                Medium
                </h1>
            </div>
            <div class="movie-card movie-card-3" 
            onclick="window.location.href='stage_3.php';">
                <h1 class="main-heading">
                Hard
                </h1>
            </div>
        </div>
    </div>

    <div class="game-content">
        <h1>Turns: <span id="turns">0</span></h1>
        <div id="board">
        </div>
    </div>
</body>

</html>