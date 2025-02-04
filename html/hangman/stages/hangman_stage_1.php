<?php
/**
 * Hangman stage 1 screen
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
    <title>Hangman</title>
    <style>
        <?php require 'hangman_game.css'; ?>
    </style>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script type='module' src="hangman_game.js" difficulty='easy'></script>

<body>
    <?php require "../../components/navbar/navbar.php"; ?>

    <div class="game-over-screen">
        <h1>Game Over</h1>
        <div class="options">
            <button class="option-button button1" 
             onclick="window.location.href='../../index.php'"></button>
            <button class="option-button button2" 
             onclick="window.location.href='hangman_stage_1.php'"></button>
        </div>
        <div class="other-stages-text">
            <h1>Other stages available to play:</h1>
        </div>
        <div class="movie-cards-container">
            <div class="movie-card movie-card-2" 
            onclick="window.location.href='hangman_stage_2.php';">
                <h1 class="main-heading-2">
                Medium
                </h1>
            </div>
            <div class="movie-card movie-card-3" 
            onclick="window.location.href='hangman_stage_3.php';">
                <h1 class="main-heading">
                Hard
                </h1>
            </div>
        </div>
    </div>

    <div class="game-content">

        <div class="main-heading">
            <h1>Guess the CS word! (Easy)</h1>
        </div>

        <div class="content-container">
            <div class="image-container">
                <img src="../../images/hangman/hangman1.png" 
                draggable="false" alt="Zoomable Image" id="hangman-image">
            </div>

            <?php $stage = 'easy';?>
            <?php require "../../components/hint_button/hint_button.php"; ?>
        </div>

        <div class="word-container">
            <h2 id="word-display"></h2>
        </div>

        <?php require "../../components/keyboard/keyboard.php"; ?>

    </div>


</body>

</html>