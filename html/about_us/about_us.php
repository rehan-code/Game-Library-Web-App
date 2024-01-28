<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CIS 4250 - Team 8 </title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="about_us.css" />
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
        <div class="header-container">
            <div class="overlay"></div>
                <h1 class="about-main-heading">Who We Are</h1>
            </div>
            <h2 class="heading2">Our project </h2>
            <p class="heading2para">We have a team VM hosted on a SoCS server. The Debian Linux VM has NGINX, PHP,
                and MySQL installed. The web server is configured and is already running with HTTPS
                enabled. The website PHP directory is /var/www/html
                The website includes:
                <dl class="heading2para">
                    <li>Landing Page</li>
                    <li>About Us Page.</li>
                </dl>
            </p>
            <h2 class="heading2">Meet our team members</h2>
            <div class="profile-cards-grid">
                <div class="card">
                    <a href="https://www.linkedin.com/in/harikrishansingh/" target="_blank" class="linkedin-icon">
                        <img src="../images/linkedin_icon.png" alt="LinkedIn Icon">
                    </a>
                    <div class="profile-picture">
                        <img src='../images/hari.jpg' alt="Harikrishan Profile Picture">
                    </div>
                    <div class="profile-details">
                        <?php 
                            include "snippets/hari_snippet.php";
                        ?>
                    </div>
                </div>
                <div class="card">
                    <a href="https://www.linkedin.com/in/ivanodielmagtangob/" target="_blank" class="linkedin-icon">
                        <img src="../images/linkedin_icon.png" alt="LinkedIn Icon">
                    </a>
                    <div class="profile-picture">
                        <img src='../images/ivan.png' alt="Ivan Profile Picture">
                    </div>
                    <div class="profile-details">
                        <?php 
                            include "snippets/ivan_snippet.php";
                        ?>
                    </div>
                </div>
                <div class="card">
                    <a href="https://www.linkedin.com/in/rehan-nagoor-mohideen-6b3156202/" target="_blank" class="linkedin-icon">
                        <img src="../images/linkedin_icon.png" alt="LinkedIn Icon">
                    </a>
                    <div class="profile-picture">
                        <img src='../images/rehan.jpg' alt="Rehan Profile Picture">
                    </div>
                    <div class="profile-details">
                        <?php 
                            include "snippets/rehan_snippet.php";
                        ?>
                    </div>
                </div>
                <div class="card">
                    <a href="https://www.linkedin.com/in/thulasijothiravi/" target="_blank" class="linkedin-icon">
                        <img src="../images/linkedin_icon.png" alt="LinkedIn Icon">
                    </a>
                    <div class="profile-picture">
                        <img src='../images/thulasi.jpg' alt="Thulasi Profile Picture">
                    </div>
                    <div class="profile-details">
                        <?php 
                            include "snippets/thulasi_snippet.php";
                        ?>
                    </div>
                </div>
                <div class="card">
                    <a href="https://www.linkedin.com/in/harir-hammadi-944aa4135/" target="_blank" class="linkedin-icon">
                        <img src="../images/linkedin_icon.png" alt="LinkedIn Icon">
                    </a>
                    <div class="profile-picture">
                        <img src='../images/user.jpg' alt="Harir Profile Picture">
                    </div>
                    <div class="profile-details">
                        <?php 
                            include "snippets/harir_snippet.php";
                        ?>
                    </div>
                </div>
                <div class="card">
                    <a href="https://www.linkedin.com/in/nour-tayem-softwareeng/" target="_blank" class="linkedin-icon">
                        <img src="../images/linkedin_icon.png" alt="LinkedIn Icon">
                    </a>
                    <div class="profile-picture">
                        <img src='../images/nour.jpeg' alt="Nour Profile Picture">
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
