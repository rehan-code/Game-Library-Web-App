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
        <?php require 'hangman.css'; ?>
    </style>
</head>

<body>
    <?php require "../components/navbar/navbar.php"; ?>

    <div class="main-heading">
        <h1>Guess the words</h1>
    </div>

    <div class="guesses">
        <h2>Guesses: <span>9</span></h2>
    </div>

    <div class="content-container">
        <div class="image-container">
            <img src="../images/hangman/hangman9.png" draggable="false"
            alt="Zoomable Image" id="hangmanImage">
        </div>
        <div class="form-container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input class="form-input" type="text" name="field1" pattern="[A-Za-z]" maxlength="1" required>

                <input class="form-input" type="text" name="field2" pattern="[A-Za-z]" maxlength="1" required>

                <input class="form-input" type="text" name="field3" pattern="[A-Za-z]" maxlength="1" required>

                <input class="form-input" type="text" name="field4" pattern="[A-Za-z]" maxlength="1" required>

                <input class="form-input" type="text" name="field5" pattern="[A-Za-z]" maxlength="1" required>

                <button class="form-button" type="submit">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>
