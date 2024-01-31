<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    
    <!-- CSS style -->
    <style>
        <?php include './about_us.css'; ?>
        <?php include '../style.css'; ?>
    </style>
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
                    <a href="about_us/about_us.php" class="nav_menu_link">About Us</a>
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

    <!-- Main Content -->
    <section class="wrapper">
        <div class="container">
            <div class="header-container">
                <div class="overlay"></div>
                <h1 class="about-main-heading">Who We Are</h1>
            </div>
            <h2 class="heading2">Our project</h2>
            <p class="heading2para">
                We have a team VM hosted on a SoCS server. The Debian Linux VM has NGINX, PHP,
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
                <?php
                $team_members = array(
                    array("name" => "Harikrishan", "image" => "hari.jpg", "linkedin" => "https://www.linkedin.com/in/harikrishansingh/"),
                    array("name" => "Ivan", "image" => "ivan.png", "linkedin" => "https://www.linkedin.com/in/ivanodielmagtangob/"),
                    array("name" => "Rehan", "image" => "rehan.jpg", "linkedin" => "https://www.linkedin.com/in/rehan-nagoor-mohideen-6b3156202/"),
                    array("name" => "Thulasi", "image" => "thulasi.jpg", "linkedin" => "https://www.linkedin.com/in/thulasijothiravi/"),
                    array("name" => "Harir", "image" => "user.jpg", "linkedin" => "https://www.linkedin.com/in/harir-hammadi-944aa4135/"),
                    array("name" => "Nour", "image" => "nour.jpeg", "linkedin" => "https://www.linkedin.com/in/nour-tayem-softwareeng/")
                );

                foreach ($team_members as $member) {
                    echo '<div class="card">';
                    echo '<a href="' . $member["linkedin"] . '" target="_blank" class="linkedin-icon">';
                    echo '<img src="../images/linkedin_icon.png" alt="LinkedIn Icon">';
                    echo '</a>';
                    echo '<div class="profile-picture">';
                    echo '<img src="../images/' . $member["image"] . '" alt="' . $member["name"] . ' Profile Picture">';
                    echo '</div>';
                    echo '<div class="profile-details">';
                    include "snippets/" . strtolower($member["name"]) . "_snippet.php";
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>
</body>
</html>
