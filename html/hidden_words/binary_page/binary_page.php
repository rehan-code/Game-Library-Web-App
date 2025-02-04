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
    <title>You Found A Clue!</title>
    <style>
        <?php require './binary_page.css'; ?>
    </style>
</head>

<body>
    <?php require "../../components/navbar/navbar.php"; ?>
    
    <div class="container" id="wordContainer" data-word="Discover">
        <p><span id="binaryOutput"></span></p>
    </div>
    
    <script type="module">
        <?php require "./binary_page.js"; ?>
    </script>
</body>

</html>
