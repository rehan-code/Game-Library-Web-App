<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Instruction</title>
        <link rel="stylesheet" href="instruction.css" />
        <link rel="stylesheet" href="../style.css" />
        <link rel="stylesheet" href="../about_us/about_us.css" />
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
                    <a href="instruction.php" class="nav_menu_link">Instructions</a>
                </li>
            </ul>
        </div>

        <button class="toggle_btn" id="toggle_btn">
            <i class="ri-menu-line"></i>
        </button>
        </nav>
    </header>
    <section class="wrapper-instruction">
        <div class="container-instruction">
            <div class="header-container">
                <div class="overlay1"></div>
                <h1 class="about-main-heading1">INSTRUCTIONS</h1>
            </div>
            <h2 class="heading2">Overview</h2>
            <p class="heading2para">
                "Where's Waldo?" is a puzzle book series created by British illustrator Martin Handford. 
                The books feature detailed, crowded scenes filled with people, objects, 
                and various activities, and the goal is to find the character Waldo—a glassed man wearing eccentric red and white striped
                clothes—within the image.
            </p>
            <h2 class="heading2">Objective</h2>
            <p class="heading2para">
                Find Waldo hiding within each scene.
            </p>
            <h2 class="heading2">Instructions</h2>
            <div class="bottom-margin-setting">
                <div class="rounded-box">
                    <p> 
                        <ul class="list-class">
                            <li>- Click on Waldo using the <strong>Mouse</strong> button upon locating Waldo</li>
                            <li>- Double-click to zoom in</li>
                            <li>- Failing to click on Waldo deducts <strong>1 point</strong> from your score</li>
                            <li>- Losing all points results in a <strong>Game Over</strong></li>
                        </ul>
                    </p>
                </div>
            </div>
            <div class="bottom-margin-setting">
                <div class="heading3">
                    <h2></h2>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>