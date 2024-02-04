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
                Our friends have gone missing! They could be anywhere.
                <br>
                Can you help us find Them?
            </p>

            <!-- stages -->
            <br>
            <br>
            <br>
            <br>
            <br>
            <h1 class="main-heading">
                <span>Stages</span>
            </h1>
            <div class="movie-card movie-card-1" 
            onclick="window.location.href='stages/waldo_stage_1.php';">
                <h1 class="main-heading">
                    Forest
                </h1>
            </div>
            <div class="movie-card movie-card-2" 
            onclick="window.location.href='stages/waldo_stage_2.php';">
                <h1 class="main-heading">
                    Kingdom
                </h1>
            </div>
            <div class="movie-card movie-card-3" 
            onclick="window.location.href='stages/waldo_stage_3.php';">
                <h1 class="main-heading">
                    Neighbourhood
                </h1>
            </div>
        </div>
    </section>
</body>

</html>