<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Where's Waldo Game</title>
    <link rel="stylesheet" href="waldo_game.css" />
    <!-- <link rel="stylesheet" href="../style.css" /> -->
</head>
<body>
    <!-- Navbar -->
    <header class="container header">
        <nav class="nav">
        <div class="logo">
            <h2>CIS 4250</h2>
        </div>

        <div class="nav_menu" id="nav_menu">
            <button class="close_btn" id="close_btn">
                <i class="ri-close-fill"></i>
            </button>
            <? $pagename = basename($_SERVER['PHP_SELF']);?>
            <ul class="nav_menu_list">
                <li class="nav_menu_item">
                    <a <?php if($pagename=="home.php") {echo 'class="current"';}?> href="../index.php" class="nav_menu_link">Home</a>
                </li>
                <li class="nav_menu_item">
                    <a href="../about_us/about_us.php" class="nav_menu_link">About Us</a>
                </li>
                <li class="nav_menu_item">
                    <a href="../instruction/instruction.php" class="nav_menu_link">Instructions</a>
                </li>
            </ul>
        </div>

        <button class="toggle_btn" id="toggle_btn">
            <i class="ri-menu-line"></i>
        </button>
        </nav>
    </header>

    <header class="main-heading">
        <h1>Where's Waldo Game</h1>
    </header>

    <!-- <nav>
        <a href="index.php">Home</a>
        <a href="#">Instructions</a>
        <a href="about_us/about_us.php">About</a>
    </nav> -->
    
    <div id="gameOverScreen">
        <h1>Game Over</h1>
    </div>

    <div class="image-container" onclick="notFound(event)" ondblclick="zoomIn(event)">
        <img src="../images/findwaldo.jpg" draggable="false" alt="Zoomable Image" id="waldoImage">
        <button class="found-button" onclick="isFound(event)"></button>
    </div>
    
    <div id="scoreboard">
        <h2>Lives: <span id="score">10</span></h2>
    </div>
    
    <script src="waldo_game.js"></script>
</body>
</html>
