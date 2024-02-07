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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Where's Waldo Game</title>
    <style>
        <?php require 'waldo_game.css'; ?>
    </style>
</head>

<body>
    <?php require "../../components/navbar/navbar.php"; ?>

    <div class="main-heading">
        <h1>Find the Lion!</h1>
    </div>

    <!-- Full-Screen Toggle Button -->
    
    <div class="game-over-screen">
        <h1>Game Over</h1>
        <div class="options">
            <button class="option-button button1" 
            onclick="window.location.href='../../index.php'"></button>
            <button class="option-button button2" 
            onclick="window.location.href='waldo_stage_1.php'"></button>
        </div>
        <div class="other-stages-text">
            <h1>Other stages available to play:</h1>
        </div>
        <div class="movie-cards-container">
            <div class="movie-card movie-card-2" 
            onclick="window.location.href='waldo_stage_2.php';">
                <h1 class="main-heading">
                Kingdom
                </h1>
            </div>
            <div class="movie-card movie-card-3" 
            onclick="window.location.href='waldo_stage_3.php';">
                <h1 class="main-heading">
                Neighbourhood
                </h1>
            </div>
        </div>
    </div>

    <div class="image-container" style="position: relative;" onclick="notFound(event)" ondblclick="zoomIn(event)">
        <img src="../../images/waldo_stage_1.jpg" draggable="false" alt="Zoomable Image" id="waldoImage">
        <button class="fullscreen-toggle "><i class="fa fa-arrows-alt"></i></button>
        <button class="found-button-1" onclick="isFound(event)"></button>
    </div>


    <div class="scoreboard">
        <h2>Lives: <span class="score">10</span></h2>
    </div>

    <script>
        <?php require 'waldo_game.js'; ?>
    </script>
</body>

</html>
