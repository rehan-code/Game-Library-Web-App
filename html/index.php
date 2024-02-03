<?php
/**
 * Blah blah blah
 * php version 8.1.2
 * 
 * @author Rehan Nagoor Muhmannanaa <rnahoorm@uoguelph.ca>
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
                We, Team 8, are dedicated to developing engaging online games.
                Our inaugural release is an expanded edition of the classic 
                'Where's Waldo?' game. In this immersive experience, your
                challenge goes beyond locating Waldo himself, as you discover 
                a myriad of additional objectives. As our team continues to
                work diligently, we envision a future where you can explore a 
                diverse range of games crafted by our dedicated team.
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
                    Where's Waldo Game
                </h1>
                <p class="info-text">
                    Our friend Waldo has gone missing! He could be anywhere.
                    <br>
                    Can you help us find him?
                </p>
            </div>
        </div>
    </section>
</body>
</html>