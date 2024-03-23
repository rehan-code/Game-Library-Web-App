<?php

/**
 * I-spot stage select screen
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
                <span>I-Spot</span>
            </h1>
            <p class="info-text">
                Our Game, is inspired by the concept of 'Where's Waldo?' by
                British illustrator Martin Handford, presents a fresh twist
                on the classic search-and-find adventure. In these vibrant
                scenes, bustling with an array of unique icons, objects,
                and characters engaged in diverse activities, the challenge
                remains the same: locating our elusive icon among the crowd.
                Much like Waldo, our distinctive figure stands out with its
                own quirky characteristics amidst the intricately illustrated
                landscape. Get ready to embark on a captivating journey of
                observation and discovery as you hunt for our signature icon
                within each captivating image!
                <br>
                Can you help us find Them?
            </p>

            <!-- stages -->
            <h1 class="main-heading">
                <span>Instruction</span>
            </h1>
            <p>
            <ul class="instruction-list">
                <li class="instruction-item">
                    Click on the hidden item using the
                    <strong>Mouse</strong> button upon locating the item
                </li>
                <li class="instruction-item">
                    Double-click to <strong>zoom in</strong>
                </li>
                <li class="instruction-item">
                    Failing to click the hidden item deducts
                    <strong>1 point</strong> from your score
                </li>
                <li class="instruction-item">
                    Losing all points results in a
                    <strong>Game Over</strong>
                </li>
                <li>Press the light bulb-shaped
                    <strong>Hint Button</strong>
                    for a clue about the hidden item.
                </li>
                </ui>
                </p>

                <br>
                <br>
                <br>
                <br>
                <br>
                <h1 class="main-heading">
                    <span>Stages</span>
                </h1>
                <div class="movie-card movie-card-waldo-1" onclick="window.location.href='stages/waldo_stage_1.php';">
                    <h1 class="main-heading">
                        Forest
                    </h1>
                </div>
                <div class="movie-card movie-card-waldo-2" onclick="window.location.href='stages/waldo_stage_2.php';">
                    <h1 class="main-heading">
                        Kingdom
                    </h1>
                </div>
                <div class="movie-card movie-card-waldo-3" onclick="window.location.href='stages/waldo_stage_3.php';">
                    <h1 class="main-heading">
                        Neighbourhood
                    </h1>
                </div>
        </div>
    </section>
</body>

</html>