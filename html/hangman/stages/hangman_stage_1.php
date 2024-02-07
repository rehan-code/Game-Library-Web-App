<?php
/**
 * Hangman select screen
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
        <title>Hangman Game</title>
        <style>
            <?php require 'hangman.css'; ?>
        </style>
    </head>

    <body>
        <?php require "../../components/navbar/navbar.php"; ?>

        <section class="container">
            <h1>Computer Science Words</h1>
        </section>
        <ul id="wordList">
            <?php include '../fetch_words.php'; ?>
        </ul>

        <script>
            // Accessing words in JavaScript
            document.addEventListener('DOMContentLoaded', function() {
                // Select the ul element
                var wordList = document.getElementById('wordList');

                // Get all list items under the ul
                var words = wordList.querySelectorAll('.wordItem');

                // Convert NodeList to Array
                words = Array.from(words);

                // Access individual words
                words.forEach(function(word) {
                    console.log(word.textContent); // Output each word to console
                });
            });
        </script>
    </body>

</html>
