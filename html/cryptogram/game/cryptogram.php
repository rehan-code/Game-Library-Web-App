<?php
/**
 * Cryptogram 
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */

 $prompts=[
    'This is a cool story',
    'This is an even cooler story',
    "Now, this is a story all about how My life got flipped, turned upside down, and I'd like to take a minute, just sit right there, I'll tell you how I became the prince of a town called Bel-Air"
 ];
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
    </head>
    <body>
        <?php require "../../components/navbar/navbar.php"; ?>
        <h1 class="alternate">Cryptogram Puzzle</h1>
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
                <button id="popupOkButton" onclick="document.getElementById('popupContainer').style.display='none';">OK</button>
            </div>
        </div>
        <script type="module">
            <?php require "./cryptogram.js"; ?>
        </script>
    </body>
</html>
