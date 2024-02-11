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
            <h2 class="heading">Overview</h2>
            <p class="heading-paragraph">
                Our Game, is inspired by the concept of 'Where's Waldo?' by British 
                illustrator Martin Handford, presents a fresh twist on the classic 
                search-and-find adventure. In these vibrant scenes, bustling with 
                an array of unique icons, objects, and characters engaged in 
                diverse activities, the challenge remains the same: locating our 
                elusive icon among the crowd. Much like Waldo, our distinctive 
                figure stands out with its own quirky characteristics amidst the 
                intricately illustrated landscape. Get ready to embark on a 
                captivating journey of observation and discovery as you hunt for 
                our signature icon within each captivating image!
            </p>
            <h2 class="heading">Objective</h2>
            <p class="heading-paragraph">
                Within each scene:
                <ul class="list-class center-text">
                    <li>
                        <strong>Scene 1:</strong>
                         Find the Lion in the Forest.
                    </li>
                    <li>
                        <strong>Scene 2:</strong>
                         Find the Dragon in the Kingdom.
                    </li>
                    <li>
                        <strong>Scene 3:</strong>
                         Find The Skull Shirt Girl in the Neighbourhood.
                    </li>
                </ul>
            </p>

            <h2 class="heading">Instructions</h2>
            <div class="bottom-margin-setting">
                <div class="rounded-box">
                    <p> 
                        <dl class="list-class">
                            <li> Click on Waldo using the 
                                <strong>Mouse</strong> button upon locating Waldo
                            </li>
                            <li> Double-click to zoom in</li>
                            <li> Failing to click on Waldo deducts 
                                <strong>1 point</strong> from your score
                            </li>
                            <li> Losing all points results in a 
                                <strong>Game Over</strong>
                            </li>
                        </dl>
                    </p>
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