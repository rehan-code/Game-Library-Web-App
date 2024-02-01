<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Where's Waldo Game</title>
    <style>
        <?php include 'waldo_game.css'; ?>
    </style>
</head>

<body>
    <?php include("../../components/navbar/navbar.php"); ?>

    <div class="main-heading">
        <h1>The Trojan Castle</h1>
    </div>

    <div class="game-over-screen">
        <h1>Game Over</h1>
    </div>

    <div class="image-container" onclick="notFound(event)" ondblclick="zoomIn(event)">
        <img src="../../images/waldo_stage_3.jpg" draggable="false" alt="Zoomable Image" id="waldoImage" width="90%">
        <button class="found-button-3" onclick="isFound(event)"></button>
    </div>
    
    <div class="scoreboard">
        <h2>Lives: <span class="score">10</span></h2>
    </div>
    
    
    <?php
        echo '<script src="waldo_game.js"></script>';
    ?>
</body>
</html>
