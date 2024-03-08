<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Cryptogram Puzzle</title>
        <!-- <link rel="stylesheet" href="cryptogram.css"> -->
        <style>
            <?php require './cryptogram.css'; ?>
            <?php require '../congrats/congrats.css'; ?>
        </style>
    </head>
    <body>
        <?php require "../../components/navbar/navbar.php"; ?>
        <h1 class="alternate">Cryptogram Puzzle</h1>
        <div class="container">
            <div class="source">Source: <span id="source-name">Homer Simpson</span></div>
            <div id="cryptogram"></div>
            <button class="Button" onclick = "window.location.href='../congrats/congrats_page.php'">
            <span class="Button-inner">
                Submit
            </span>
        </button>
        </div>
        <script type="module">
            <?php require "./cryptogram.js"; ?>
        </script>
    </body>
</html>
