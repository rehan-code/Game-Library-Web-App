<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CIS 4250 - Team 8 </title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="aboutus.css" />
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
                <a <?php if($pagename=="home.php") {echo 'class="current"';}?> href="../index.php" class="nav_menu_link">Home</a>
            </li>
            <li class="nav_menu_item">
                <a <?php if($pagename=="test.php") {echo 'class="current"';}?> href="about_us.php" class="nav_menu_link">About Us</a>
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
            <h1 class="about-main-heading">Who We Are</h1>
            <h2>Our project: </h2>
            <p>This is where our project information will go. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <h2>Meet our team members:</h2>
            <div class="profile-cards-grid">
                <div class="card">
                    <div class="profile-picture">
                        <img src='../images/user.jpg' alt="Profile Picture">
                    </div>
                    <div class="profile-details">
                        <?php 
                            include "snippets/hari_snippet.php";
                        ?>
                    </div>
                </div>
                <div class="card">
                    <div class="profile-picture">
                        <img src='../images/user.jpg' alt="Profile Picture">
                    </div>
                    <div class="profile-details">
                        <?php 
                            include "snippets/ivan_snippet.php";
                        ?>
                    </div>
                </div>
                <div class="card">
                    <div class="profile-picture">
                        <img src='../images/user.jpg' alt="Profile Picture">
                    </div>
                    <div class="profile-details">
                        <?php 
                            include "snippets/rehan_snippet.php";
                        ?>
                    </div>
                </div>
                <div class="card">
                    <div class="profile-picture">
                        <img src='../images/user.jpg' alt="Profile Picture">
                    </div>
                    <div class="profile-details">
                        <?php 
                            include "snippets/thulasi_snippet.php";
                        ?>
                    </div>
                </div>
                <div class="card">
                    <div class="profile-picture">
                        <img src='../images/user.jpg' alt="Profile Picture">
                    </div>
                    <div class="profile-details">
                        <?php 
                            include "snippets/harir_snippet.php";
                        ?>
                    </div>
                </div>
                <div class="card">
                    <div class="profile-picture">
                        <img src='../images/user.jpg' alt="Profile Picture">
                    </div>
                    <div class="profile-details">
                        <?php 
                            include "snippets/nour_snippet.php";
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </section>


</body>
</html>
