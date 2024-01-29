<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>CIS 4250 Team 8</title>

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
                <a <?php if($pagename=="test.php") {echo 'class="current"';}?> href="about_us/about_us.php" class="nav_menu_link">About Us</a>
            </li>
            <li class="nav_bar_list">
                <a href="./instruction/instruction.php">Instructions</a>
            </li>
            </ul>
        </div>

        <button class="toggle_btn" id="toggle_btn">
            <i class="ri-menu-line"></i>
        </button>
        </nav>
    </header>

    <section class="wrapper">
        <div class="container">
        <div class="grid-cols-2">
            <div class="grid-item-1">
            <h1 class="main-heading">
                Welcome to <span>Team 8</span>
                <br />
                website
            </h1>
            <p class="info-text">
                We, Team 8, are dedicated to developing engaging online games. Our inaugural release is an expanded edition of the classic 
                'Where's Waldo?' game. In this immersive experience, your challenge goes beyond locating Waldo himself, as you discover 
                a myriad of additional objectives. As our team continues to work diligently, we envision a future where you can explore a 
                diverse range of games crafted by our dedicated team.
            </p>

            <!-- <div class="btn_wrapper">
                <button class="btn view_more_btn" onclick="">
                Learn More <i class="ri-arrow-right-line"></i>
                </button>
            </div> -->
            </div>
            <div class="grid-item-2">
            <div class="team_img_wrapper">
                <img src="https://raw.githubusercontent.com/ananikets18/Responsive-landing-page-using-HTML-CSS-JS-/1b56418e1b24d1f997134084e9214d78a9f91780/img/team.svg" alt="team-img" />
            </div>
            </div>
        </div>
        </div>
    </section>

    <section class="container">
        <div class="grid-item-1-center">
            <h1 class="main-heading">
                <span>Our Games</span>
            </h1>
            <div class="movie-card" onclick="window.location.href='gamepage/games.php';">
                <h1 class="main-heading">
                    Where's Waldo Game
                </h1>
                <p class="info-text">
                    We're looking for a guy named Waldo. He could be anywhere.
                    <br>
                    Can you help us find him?
                </p>
                <!-- <div class="tooltip">Click to go to Waldo game page</div> -->
            </div>
        </div>
    </section>
</body>
</html>