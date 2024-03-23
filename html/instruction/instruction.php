<?php
/**
 * Instructions page
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
    <title>Instruction</title>
    <style>
        <?php require '../style.css'; ?>
        <?php require '../about_us/about_us.css'; ?>
        <?php require 'instruction.css'; ?>
    </style>
</head>

<body>
    <?php require "../components/navbar/navbar.php"; ?>

    <section class="wrapper-instruction">
        <div class="container-instruction">
            <div class="header-container">
                <div class="overlay1"></div>
                <h1 class="about-main-heading1">INSTRUCTIONS</h1>
            </div>
           
            <div class="game2">
                <h2 class="heading">'HangMan'</h2>
                <h2 class="heading">Overview</h2>
                <p class="heading-paragraph">
                Hangman is a classic word-guessing game with a twist: 
                this version focuses exclusively on computer science 
                (CS) terms. Players start with a word represented by 
                underscores, guessing one letter at a time. Correct 
                guesses reveal the letter in the word, while incorrect 
                ones contribute to drawing a hangman figure. The goal 
                is to uncover the complete CS-related word before the 
                hangman is fully drawn, offering an engaging way to 
                test both deduction skills and knowledge of computer 
                science concepts.
                </p>
                <h2 class="heading">Objective</h2>
                <p class="heading-paragraph">
                    Guess all the words within the level:
                <ul class="list-class center-text">
                    <li>
                        9 Guesses Allowed.
                    </li>
                </ul>
                </p>

                <h2 class="heading">Instructions</h2>
                <div class="bottom-margin-setting">
                    <div class="rounded-box">
                        <p>
                        <dl class="list-class">
                            <li> Players guess one letter at a time.
                            </li>
                            <li> <strong>Correct</strong> guesses fill in the
                                blanks <strong>incorrect</strong> guesses lead to
                                drawing a hangman figure.</li>
                            <li> Win by guessing
                                the word before the hangman is complete. </li>
                            <li> Lose if the hangman is fully drawn before
                                guessing the word. Leading to
                                <strong>Game Over</strong>
                            </li>
                            <li>Press the light bulb-shaped 
                                <strong>Hint Button</strong> 
                            for a clue about the CS word to guess.
                            </li>
                        </dl>
                        </p>
                    </div>
                </div>
            </div>
            <div class="bottom-margin-setting">
                <div class="heading3">
                    <h2></h2>
                </div>
            </div>
        </div>
    </section>

</body>

</html>