<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CIS 4250 Team 8</title>
    <link rel="stylesheet" href="styles/style.css" />
    <style>
        /* Add your CSS code here */
        .logo {
            display: flex;
            align-items: center;
            padding-left: 20px; /* Adjust as needed */
        }

        .logo img {
            width: 50px; /* Adjust width as needed */
            height: auto; /* Keep the aspect ratio */
            margin-right: 10px; /* Space between the logo and the text */
        }

        .logo h2 {
            font-size: 28px;
            color: var(--primary-color);
            margin: 0; /* Removes default margin */
        }
    </style>
</head>
<body>
    <header class="container header">
        <nav class="nav">
            <div class="logo">
                <img src="images/8.png" alt="Logo"> 
                <h2>Team 8</h2>
            </div>

            <div class="nav_menu" id="nav_menu">
                <button class="close_btn" id="close_btn">
                    <i class="ri-close-fill"></i>
                </button>
                <?php $pagename = basename($_SERVER['PHP_SELF']);?>
                <ul class="nav_menu_list">
                    <li>
                        <a <?php if($pagename=="home.php") {echo 'class="current"';}?> href="../index.php" class="nav_menu_link">Home</a>
                    </li>
                    <li class="nav_menu_item">
                        <a <?php if($pagename=="about_us/about_us.php") {echo 'class="current"';}?> href="about_us/about_us.php" class="nav_menu_link">About Us</a>
                    </li>
                    <li class="nav_menu_item">
                        <a href="instruction/instruction.php" class="nav_menu_link">Instructions</a>
                    </li>
                </ul>
            </div>

            <button class="toggle_btn" id="toggle_btn">
                <i class="ri-menu-line"></i>
            </button>
        </nav>
    </header>

    <section class="container">
            <div class="grid-item-1-center">
                <h1 class="main-heading">
                    Welcome to Team 8
                    website
                </h1>
                <p class="info-text">
                We, Team 8, are dedicated to developing engaging online games. Our inaugural release is an expanded edition of the classic 'Where's Waldo?' game.
                 In this immersive experience, your challenge goes beyond locating Waldo himself, as you discover a myriad of additional objectives. 
                As our team continues to work diligently, we envision a future where you can explore a diverse range of games crafted by our dedicated team.
                </p>
                <div class="movie-card" onclick="window.location.href='gamepage/games.php';">
                    <h1 class="main-heading">
                        Where's Waldo Game
                    </h1>
                    <p class="info-text">
                        We're looking for a guy. He could be anywhere.
                        Can you find Waldo (Wally) in the picture? (Click to go to Waldo game page)
                    </p>
                    <div class="tooltip">Click to go to Waldo game page</div>
                </div>
            </div>
    </section>
</body>
</html>