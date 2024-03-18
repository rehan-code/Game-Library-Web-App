<?php
    /**
     * Cryptogram 
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
        <title>Cryptogram Puzzle</title>
        <style>
            <?php require './cryptogram.css'; ?>
            <?php require '../congrats/congrats.css'; ?>
        </style>
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php require "../../components/navbar/navbar.php"; ?>
        <div class="game-over-screen">
            <h1>Game Over</h1>
            <div class="options">
                <button class="option-button button1" 
                onclick="window.location.href='../../index.php'"></button>
                <button class="option-button button2" 
                onclick="window.location.href='hangman_stage_3.php'"></button>
            </div>
        </div>

        <div class="game-content">
            <h1 class="alternate">Cryptogram Puzzle</h1>
            <?php $stage = 'cryptogram';?>
            <?php require "../../components/hint_button/hint_button.php";?>
            <div class="container crypto-width">
                <div id="cryptogram"></div>
                <button class="Button" id="submitCryptogram">
                    <span class="Button-inner">
                        Submit
                    </span>
                </button>
            </div>
            <div id="popupContainer">
                <p>Incorrect Cryptogram!</p>
                <div class="center">
                    <button id="popupOkButton" 
                    onclick="document.getElementById('popupContainer').
                    style.
                    display='none';">
                        OK
                    </button>
                </div>
            </div>
            <script type="module">
                <?php require "./cryptogram.js"; ?>
            </script>
        </div>
    </body>
</html>
