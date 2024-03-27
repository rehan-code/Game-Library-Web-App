<?php
/**
 * Cyber coin stage 1 screen
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
    <title> Fundamentals of Computer Science </title>
    <style>
        <?php require 'cyber_coin.css'; ?>
    </style>
    <script src="cyber_coin.js"></script>
</head>



<body>
    <?php require "../../components/navbar/navbar.php"; ?>
    
    <div class="game-over-screen">
         <h1>Game Over!</h1>
         <div class="options2">
             <button class="option-button button1" 
              onclick="window.location.href='../../index.php'"></button>
             <button class="option-button button2" 
              onclick="window.location.href='cyber_coin_stage_1.php'"></button>
         </div>
     </div>
    <div class="game-content">
        <div class="main-heading">
            <h1>Cyber Coin Quest</h1>
            <h2 id="score">Score: </h2>
            <div class="timer-container">
                <span class="timer-icon">&#9202;</span>
                <span id="timer" class="timer-text">30s</span>
            </div>
        </div>
        <div class="container">
            <h1 id="question"></h1>
            <div id="options" class="options"></div>
            <p id="result"></p>
        </div>
     </div>
     <script>
        document.addEventListener("DOMContentLoaded", function() {
            displayRandomQuestion(0, 1);
        });
    </script>   

</body>

</html>