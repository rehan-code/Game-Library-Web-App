<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>CIS 4250 - Team 8 </title>
        <link rel="stylesheet" href="instruction.css" />
        <link rel="stylesheet" href="../styles/style.css" />
        <link rel="stylesheet" href="../about_us/about_us.css" />
    </head>
    <body>
        <header class="container header">
            <nav class="nav">
                <div class="logo">
                    <h2>Where's Waldo</h2>
                </div>

                <div class="nav_menu" id="nav_menu">
                    <button class="close_btn" id="close_btn">
                        <i class="ri-close-fill"></i>
                    </button>
                    <?php $pagename = basename($_SERVER['PHP_SELF']);?>
                    <ul class="nav_menu_list">
                        <li class="nav_menu_item">
                            <a <?php if($pagename=="home.php") {echo 'class="current"';}?> href="../index.php" class="nav_menu_link">Home</a>
                        </li>
                        <li class="nav_menu_item">
                            <a <?php if($pagename=="about_us/about_us.php") {echo 'class="current"';}?> href="../about_us/about_us.php" class="nav_menu_link">About Us</a>
                        </li>
                        <li class="nav_menu_item">
                            <a <?php if($pagename=="instruction.php") {echo 'class="current"';}?> href="instruction.php" class="nav_menu_link">Instructions</a>
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
                <p class="heading2para">"Where's Waldo?" is a puzzle book series created by British illustrator Martin Handford. 
                    The books feature detailed, crowded scenes filled with people, objects, 
                    and various activities, and the goal is to find the character Waldo, who is often well-hidden within the illustrations. 
                    We have created our own version of this game. Here you need to find different images shown to win the level.
                    Here's a general overview of the game and how to play:
                </p>
                <div>
                    <div class="heading3">
                        <h2>Objective</h2>
                    </div>
                    <div class="rounded-box">
                        <p> 
                            <ul class="list-class">
                                <li><strong>Goal:</strong> The primary goal of the game is to identify and locate various shapes or images within a larger given image/scene.</li>
                                <li><strong>Scenes:</strong> Each image is a unique setting. The scenes range from crowded cities and landscapes to fantastical and historical settings.</li>
                                <li><strong>Difficulty Levels:</strong> The difficulty varies across scenes, with some being more challenging than others. The complexity increases as you progress through the levels.</li>
                            </ul>
                        </p>
                    </div>
                </div>
                <div class="bottom-margin-setting">
                    <div class="heading3">
                        <h2>Instructions</h2>
                    </div>
                    <div class="rounded-box">
                        <p> 
                            <ul class="list-class">
                                <li><strong>Examine the Scene:</strong> Take a moment to study the entire image. Pay attention to the details, colors, and patterns.</li>
                                <li><strong>Focus on Waldo's Features:</strong> Look for Waldo's distinctive features or the features of the object you are trying to find.</li>
                                <li><strong>Search Methodically:</strong> Start your search systematically, scanning the scene from left to right and top to bottom. Look for patterns and shapes that match the features.</li>
                                <li><strong>Check Small Details:</strong> Targeted objects might be partially hidden behind other objects, peeking out from behind other characters, or in unexpected locations. Pay attention to small details.</li>
                                <li><strong>Use the Clues:</strong> Use hints as the last resort. This helps you find the first objective image.</li>
                                <li><strong>Be Patient:</strong> Finding objective images can sometimes be challenging, especially in more intricate scenes. Take your time and enjoy the process of discovery.</li>
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