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
</head>
<script type='module' src="hangman_game.js" difficulty='easy'></script>

<body>
    <?php require "../../components/navbar/navbar.php"; ?>

    <div class="main-heading">
        <h1>Guess the CS word!</h1>
    </div>

    <div class="game-over-screen">
        <h1>Game Over</h1>
        <div class="options">
            <button class="option-button button1" 
            onclick="window.location.href='../../index.php'"></button>
            <button class="option-button button2" 
            onclick="window.location.href='hangman_stage_1.php'"></button>
        </div>
    </div>
    
    <div class="content-container">
        <div class="image-container">
            <img src="../../images/hangman/hangman9.png" draggable="false"
            alt="Zoomable Image" id="hangmanImage">
        </div>
    </div>

    <div class="word-container">
        <h2 id="word-display"></h2>
    </div>

    <div id="keyboard">
    <button class="key">A</button>
    <button class="key">B</button>
    <button class="key">C</button>
    <button class="key">D</button>
    <button class="key">E</button>
    <button class="key">F</button>
    <button class="key">G</button>
    <button class="key">H</button>
    <button class="key">I</button>
    <button class="key">J</button>
    <button class="key">K</button>
    <button class="key">L</button>
    <button class="key">M</button>
    <button class="key">N</button>
    <button class="key">O</button>
    <button class="key">P</button>
    <button class="key">Q</button>
    <button class="key">R</button>
    <button class="key">S</button>
    <button class="key">T</button>
    <button class="key">U</button>
    <button class="key">V</button>
    <button class="key">W</button>
    <button class="key">X</button>
    <button class="key">Y</button>
    <button class="key">Z</button>
</div>


</body>

</html>

