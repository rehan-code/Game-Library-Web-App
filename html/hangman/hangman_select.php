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
                <span>Hangman</span>
            </h1>
            <p class="info-text">
                Someone's words have been concealed, and it's up to you to reveal them letter by letter. <br>
                A mystery word awaits decryption. Every correct guess brings you closer to unveiling <br>
               the hidden message, but be cautious — too many wrong guesses, and the hangman's noose tightens! <br>
               Are you up for the challenge? <br>
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
            <div class="movie-card-main-2 movie-card-hangman" 
            onclick="window.location.href='stages/hangman__stage_1.php';">
                <h1 class="main-heading">
                    Easy
                </h1>
            </div>
        </div>
    </section>
</body>

</html>