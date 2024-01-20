<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CIS 4250 - Team 8 </title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header class="container header">
    <!-- Navbar -->
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
              <a <?php if($pagename=="test.php") {echo 'class="current"';}?> href="aboutus.php" class="nav_menu_link">About Us</a>
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
              This is our landing Page for our CIS 4250 Site. Click below to learn more...
            </p>

            <div class="btn_wrapper">
              <button class="btn view_more_btn" onclick="">
                Learn More <i class="ri-arrow-right-line"></i>
              </button>
            </div>
          </div>
          <div class="grid-item-2">
            <div class="team_img_wrapper">
              <img src="https://raw.githubusercontent.com/ananikets18/Responsive-landing-page-using-HTML-CSS-JS-/1b56418e1b24d1f997134084e9214d78a9f91780/img/team.svg" alt="team-img" />
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>