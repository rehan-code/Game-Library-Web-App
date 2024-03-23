<?php
/**
 * Cyber coin stage select screen
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
                <span>Cyber Coin Quest</span>
            </h1>
            <p class="info-text">
                Cyber Coin Quest is an action-packed puzzle adventure game set 
                in a computer science world. Players take on the role of a 
                talented hacker on a mission to collect cyber coins. Cyber Coin 
                Quest offers an exhilarating experience for players seeking thrills 
                in the digital frontier. Are you ready to dive into the virtual 
                universe and become the<br> Ultimate Cyber Coin Master?
            </p>

            <!-- stages -->
            <h1 class="main-heading">
                <span>Instruction</span>
            </h1>
            <p>
                <ui>
                    <li>
                        <strong>Guess Correct Answers:</strong>
                        The player must guess the correct answers
                        for 20 questions presented in the game.
                    </li>
                    <li>
                        <strong>Avoid Wrong Answers:</strong>
                        Be careful! If the player guesses one question
                        incorrectly, the game ends.
                    </li>
                    <li>
                        <strong>Earn Coins: </strong>
                        Successfully guessing the answers in a
                        streak earns the player one cyber coin for
                        each correct answer.
                    </li>
                    <li>
                        <strong>Aim for High Score:</strong>
                        Keep guessing correctly to build a streak and earn
                        as many cyber coins as possible. How many coins can
                        you collect before making a wrong guess?
                    </li>
                </ui>
            </p>

            <br>
            <h1 class="main-heading">
                <span>Stages</span>
            </h1>
            <div class="movie-card cyber-coin-bg" 
            onclick="window.location.href='stages/cyber_coin_stage_1.php';">
                <h1 class="main-heading-2">
                    Fundamentals of Computer Science
                </h1>
            </div>
            <div class="movie-card cyber-coin-stage2" 
            onclick="window.location.href='stages/cyber_coin_stage_2.php';">
                <h1 class="main-heading-2">
                    Video Games
                </h1>
            </div>
            <div class="movie-card cyber-coin-stage3" 
            onclick="window.location.href='stages/cyber_coin_stage_3.php';">
                <h1 class="main-heading-2">
                    Movies
                </h1>
            </div>
        </div>
    </section>
</body>

</html>