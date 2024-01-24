<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Where's Waldo Game</title>
    <link rel="stylesheet" href="styles/style.css" />
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
                        <a <?php if($pagename=="about_us/about_us.php") {echo 'class="current"';}?> href="about_us/about_us.php" class="nav_menu_link">About Us</a>
                    </li>
                    <li class="nav_menu_item">
                        <a href="#" class="nav_menu_link">Instructions</a>
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
                    Where's <span>Waldo</span> Game
                </h1>
                <p class="info-text">
                    We're looking for a guy. He could be anywhere.
                    Can you find Waldo (Wally) in the picture?
                </p>

                <div>
                  <div> 
                      <div class="btn_wrapper">
                        <form action="waldo_game.php" method="get">
                            <input type="submit" class="btn view_more_btn" value="Start Game">
                        </form>
                      </div>
                  </div>
                </div>
        </div>
    </section>
</body>
</html>