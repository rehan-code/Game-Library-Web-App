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
                Team 8 proudly presents our unique version of the beloved 'Where's waldo' game. In this expanded edition, 
                your quest goes beyond spotting Waldo as you uncover a multitude of additional objectives within our captivating 
                images. Instead of searching for Waldo, you'll be on the lookout for our own icons, adding a fresh twist to the
                classic gameplay. Join us on a journey through a diverse range of engaging games crafted by our dedicated team.
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
        <div class="grid-item-1-center">
            <h1 class="main-heading">
                <span>Our Games</span>
            </h1>
            <div
                class="movie-card movie-card-2"
                onclick="window.location.href='waldo_game/waldo_select.php';"
            >
                <h1 class="main-heading">
                    I - Spot Game
                </h1>
                <p class="info-text">
                    Our friends have gone missing! They could be anywhere.
                    <br>
                    Can you help us find Them?
                </p>
            </div>
        </div>
    </section>
</body>
</html>