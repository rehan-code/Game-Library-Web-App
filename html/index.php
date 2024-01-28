<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CIS 4250 Team 8</title>

    <!-- CSS style -->
    <style>
        <?php include './styles/style.css'; ?>
    </style>

</head>
<body>

    <!-- Navigation bar -->
    <div class="nav_bar">
        <ul class="nav_bar_menu">
            <li class="nav_bar_list nav_bar_list_logo">
                <img id="portrait" src="./images/8.png" alt="Logo">
            </li>
            <li class="nav_bar_list"><a href="./index.php">Home</a></li>
            <li class="nav_bar_list"><a href="./about_us/about_us.php">About Us</a></li>
            <li class="nav_bar_list"><a href="./instruction/instruction.php">Instructions</a></li>
        </ul>
    </div>


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