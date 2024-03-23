<?php
/**
 * Hangman stage select screen
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
    <title>Game</title>
    <style>
        <?php require '../style.css'; ?>
    </style>
</head>

<body>
    <?php require "../components/navbar/navbar.php"; ?>

    <section class="container">
        <div class="grid-item-1-center">
            <h1 class="main-heading">
                <span>Hangman</span>
            </h1>
            <p class="info-text">
                Hangman is a classic word-guessing game with a twist: 
                this version focuses exclusively on computer science 
                (CS) terms. Players start with a word represented by 
                underscores, guessing one letter at a time. Correct 
                guesses reveal the letter in the word, while incorrect 
                ones contribute to drawing a hangman figure. The goal 
                is to uncover the complete CS-related word before the 
                hangman is fully drawn, offering an engaging way to 
                test both deduction skills and knowledge of computer 
                science concepts.<br>
            </p>
            <h1 class="main-heading">
                <span>Instruction</span>
            </h1>
            <p>
                <ul class="instruction-list">
                    <li class="instruction-item">
                        <strong>Guess Letters:</strong> Players must guess one letter at a time to uncover the hidden word.
                    </li>
                    <li class="instruction-item">
                        <strong>Fill in the Blank:</strong> Correct guesses fill in the blanks of the hidden word, revealing more of the word with each correct guess.
                    </li>
                    <li class="instruction-item">
                        <strong>Watch Out for Mistakes:</strong> Incorrect guesses result in drawing a hangman figure. Be cautious not to make too many mistakes!
                    </li>
                    <li class="instruction-item">
                        <strong>Winning:</strong> Players win by correctly guessing the entire word before the hangman is fully drawn.
                    </li>
                    <li class="instruction-item">
                        <strong>Losing:</strong> If the hangman is completed before guessing the word correctly, it's Game Over.
                    </li>
                    <li class="instruction-item">
                        <strong>Hint Button:</strong> Press the light bulb-shaped Hint Button to receive a clue about the computer science word to guess.
                    </li>
                </ul>
            </p>
            <br>
            <h1 class="main-heading">
                <span>Stages</span>
            </h1>
            <div class="movie-card movie-card-hangman-1" 
            onclick="window.location.href='stages/hangman_stage_1.php';">
                <h1 class="main-heading-2">
                    Easy
                </h1>
            </div>
            <div class="movie-card movie-card-hangman-2" 
            onclick="window.location.href='stages/hangman_stage_2.php';">
                <h1 class="main-heading-2">
                    Medium
                </h1>
            </div>
            <div class="movie-card movie-card-hangman-3" 
            onclick="window.location.href='stages/hangman_stage_3.php';">
                <h1 class="main-heading-2">
                    Hard
                </h1>
            </div>
        </div>
    </section>
</body>

</html>