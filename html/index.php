<?php
/**
 * Main index page
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
    <title>CIS 4250 Team 8</title>
    <style>
        <?php require 'style.css'; ?>
    </style>
</head>
<script type='module' src="./hidden_words/hidden_words.js"></script>
<body>
    <?php require "components/navbar/navbar.php"; ?>

    <section class="wrapper">
        <div class="container">
        <div class="grid-cols-2">
            <div class="grid-item-1">
            <h1 class="main-heading">
                Welcome to <span>Team 8</span>
                <br />
                website
            </h1>
            <p class="info-text">
                Team 8 presents two exciting games. I-Spot,
                inspired by "Where's Waldo," takes you beyond
                the search for Waldo, adding unique icons
                for a fresh twist. Join us in diverse and
                engaging gameplay. Our second game, 'Hangman,'
                challenges you to guess names of monuments,
                places, and famous people. With limited
                guesses, reveal the hangman's fate for
                a thrilling gaming experience!
            </p>
            </div>
            <div class="grid-item-2">
            <div class="team-img-wrapper">
                <img
                    src="https://raw.githubusercontent.com/ananikets18/Responsive-landing-page-using-HTML-CSS-JS-/1b56418e1b24d1f997134084e9214d78a9f91780/img/team.svg"
                    alt="team-img"
                />
            </div>
            </div>
        </div>
        </div>
    </section>

    <section class="container">
        <!-- This is the clue word that the user has to find -->
        <p class="invisible-text info-text"> Invisible <p>
        <div class="grid-item-1-center">
            <h1 class="main-heading">
                <span>Our Games</span>
            </h1>
            <div
                class="movie-card movie-card-waldo-2"
                onclick="window.location.href='waldo_game/waldo_select.php';"
            >
                <h1 class="main-heading">
                    I-Spot
                </h1>
                <p class="info-text">
                    Our friends have gone missing! They could be anywhere.
                    <br>
                    Can you help us find Them?
                </p>
            </div>
            <div
                class="movie-card movie-card-hangman-3"
                onclick="window.location.href='hangman/hangman_select.php';"
            >
                <h1 class="main-heading-2">
                    Hangman
                </h1>
                <p class="info-text">
                    Unravel the mystery word before the hangman's fate is sealed!
                </p>
            </div>
        </div>
    </section>
    
    <form class="submission-form">
        <h1 class="secret-submission-heading mx-auto" style="width: 400px">
            <i>Found a <span>hidden</span> word? Enter them here...</i>
        </h1>
        <div class="mx-auto" style="width: 400px;">
            <input type="text" id="secret_one" name="secret_one" class="form-control"><br><br>
            <input type="text" id="secret_two" name="secret_two" class="form-control"><br><br>
            <input type="text" id="secret_three" name="secret_three" class="form-control"><br><br>
            <input type="submit" value="Submit" id="btn" class="btn btn-primary">
        </div>
    </form>

</body>
</html>