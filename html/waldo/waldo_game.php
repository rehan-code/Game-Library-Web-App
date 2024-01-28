<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Where's Waldo Game</title>
        <link rel="stylesheet" href="waldo_game.css" />
    </head>
    <body>
    <header>
        <h1>Where's Waldo Game</h1>
    </header>

    <nav>
        <a href="../index.php">Home</a>
        <a href="../instruction/instruction.php">Instructions</a>
        <a href="../about_us/about_us.php">About</a>
    </nav>

    <div class="image-container" onclick="zoomIn(event)">
         <img src="../images/findwaldo.jpg" draggable="false" alt="Zoomable Image">
    </div>
    <script src="waldo_game.js"></script>
</body>
</html>
