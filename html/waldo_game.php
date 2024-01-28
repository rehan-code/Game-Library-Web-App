<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Where's Waldo Game</title>
    <link rel="stylesheet" href="styles/waldo_game.css" />
</head>
<body>
    <header>
        <h1>Where's Waldo Game</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="#">Instructions</a>
        <a href="about_us/about_us.php">About</a>
    </nav>
    
    <div id="gameOverScreen">
        <h1>Game Over</h1>
    </div>

    <div class="image-container" onclick="notFound(event)" ondblclick="zoomIn(event)">
        <img src="images/findwaldo.jpg" draggable="false" alt="Zoomable Image" id="waldoImage">
        <button class="found-button" onclick="isFound(event)"></button>
    </div>
    
    <div id="scoreboard">
        <h2>Score: <span id="score">10</span></h2>
    </div>
    
    <script src="script.js"></script>
</body>
</html>
