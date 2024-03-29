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
            
            <div class="container congrats-width">
                
                <div class="main-heading">
                    <div class="timer-container">
                        <h3 class="alternate">Cyber Coin Quest</h3>
                    </div>
                    <div class="icons-container">
                        <div class="timer-container">
                            <span class="timer-icon">&#0036;</span>
                            <span id="score" class="timer-text">Coins: </span>
                        </div>
                        <div class="timer-container">
                            <span class="timer-icon">&#9202;</span>
                            <span id="timer" class="timer-text">30s</span>
                        </div>
                    </div>
                </div>
                
                <div class="container-2">
                    <h3 id="question"></h3>
                    <div id="options" class="options"></div>
                    <p id="result"></p>
                </div>
            </div>
        </div>
     <script>
        const randomIndex = Math.floor(Math.random() * 20);
        document.addEventListener("DOMContentLoaded", function() {
            displayRandomQuestion(randomIndex, 1);
            updateTimer(1);
        });
    </script>   

</body>

</html>