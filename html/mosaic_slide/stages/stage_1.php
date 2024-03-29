<?php
/**
 * Mosaic Slide stage 1 screen
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
    <title>Mosaic Slide</title>
    <style>
        <?php require 'mosaic.css'; ?>
    </style>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script type='module' src="mosaic.js" difficulty='easy'></script>

<body>
    <?php require "../../components/navbar/navbar.php"; ?>
    
    <img id="title" src="../../images/mosaic/stage1/logo.png">
    <div id="board">
    </div>
    <h1>Turns: <span id="turns">0</span></h1>
</body>

</html>