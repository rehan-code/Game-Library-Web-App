<?php
/**
 * Cryptogram intro screen
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
                <span>Cryptogram</span>
            </h1>
            <p class="info-text">
                Cryptic codes abound, detective!
                Dive into the world of cryptograms,
                where hidden messages await your deductive prowess.
                Decipher the encrypted text, unmask the puzzle's secrets,
                and let your investigative intuition guide you to the ultimate revelation.
                Are you ready to take on this cryptic challenge?
            </p>

            <h1 class="main-heading">
                <span>Instructions</span>
            </h1>
            <p>
                <ul class="instruction-list">
                    <li class="instruction-item">
                        Within the hidden message, each letter is encrypted to another random letter
                        (e.g. all A's become T's, B's become F's, etc.)
                    </li>
                    <li class="instruction-item">
                        Two different letters <strong>cannot</strong> be encrypted to the same letter.
                    </li>
                    <li class="instruction-item">
                        Decrypt each letter in the hidden message by entering a letter into the box beneath
                        each provided clue.
                    </li>
                    <li class="instruction-item">
                        Click <strong>Submit</strong> once you've filled in all the clues to guess the encrypted message.
                    </li>
                    <li class="instruction-item">
                        Click the <strong>Hint</strong> button in the top-right corner to reveal some information regarding
                        the encrypted message's context.
                    </li>
                </ui>
            </p>

            <br>
            <br>
            <br>
            <br>
            
            <div class="movie-card movie-card-cryptogram"
            onclick="window.location.href='./game/cryptogram.php';">
                <h1 class="main-heading-2">
                    Click to Begin
                </h1>
            </div>
        </div>
    </section>
</body>

</html>