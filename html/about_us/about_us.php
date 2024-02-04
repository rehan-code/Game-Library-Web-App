<?php
/**
 * Team About Us page.
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <!-- CSS style -->
    <style>
        <?php require '../style.css'; ?>
        <?php require 'about_us.css'; ?>
    </style>
</head>

<body>
    <?php require "../components/navbar/navbar.php"; ?>

    <!-- Main Content -->
    <section class="wrapper">
        <div class="container">
            <div class="header-container">
                <div class="overlay"></div>
                <h1 class="about-main-heading">Who We Are</h1>
            </div>
            <h2 class="heading">Our project</h2>
        <!-- <div class="paragraph-container"> -->
            <p class="heading-left">
                We are developing a website hosted on a SoCS server. The Debian
                Linux VM includes NGINX, PHP, and MySQL. Our web server is
                configured and running with HTTPS enabled, and the PHP
                directory for the website is located at /var/www/html.

                The website features:
                <dl class="heading-left header-line-height">
                    <dt>
                        <strong>Landing Page:</strong>
                        Serves as the entry point to our website, offering
                        navigation to various sections and games.
                    </dt>
                    <dt>
                        <strong>Instruction Page:</strong>
                        Provides detailed instructions and guidance for users,
                        including how to play our games.
                    </dt>
                    <dt>
                        <strong>About Us Page:</strong>
                        Here, visitors can learn about our team, our mission,
                        and our values.
                    </dt>
                    <dt>
                        <strong>Game Page:</strong>
                        Currently, we have the <strong>I-Spot</strong> game
                        available for play.
                    </dt>
                </dl>  
            </p>
      
            <h2 class="heading">Meet our team members</h2>
            <div class="profile-cards-grid">
                <?php
                $team_members = array(
                    array(
                        "name" => "Hari",
                        "image" => "hari.jpg",
                        "linkedin" => "https://www.linkedin.com/in/harikrishansingh/"
                    ),
                    array(
                        "name" => "Ivan",
                        "image" => "ivan.png",
                        "linkedin" => "https://www.linkedin.com/in/ivanodielmagtangob/"
                    ),
                    array(
                        "name" => "Rehan",
                        "image" => "rehan.jpg",
                        "linkedin" => "https://www.linkedin.com/in/rehan-nagoor-mohideen-6b3156202/"
                    ),
                    array(
                        "name" => "Thulasi",
                        "image" => "thulasi.jpg",
                        "linkedin" => "https://www.linkedin.com/in/thulasijothiravi/"
                    ),
                    array(
                        "name" => "Harir",
                        "image" => "user.jpg",
                        "linkedin" => "https://www.linkedin.com/in/harir-hammadi-944aa4135/"
                    ),
                    array(
                        "name" => "Nour",
                        "image" => "nour.jpeg",
                        "linkedin" => "https://www.linkedin.com/in/nour-tayem-softwareeng/"
                    )
                );

                foreach ($team_members as $member) {
                    echo '<div class="card">';
                    echo '<a href="'
                        . $member["linkedin"]
                        . '" target="_blank" class="linkedin-icon">';
                    echo '<img src="../images/linkedin_icon.png" alt="LinkedIn Icon">';
                    echo '</a>';
                    echo '<div class="profile-picture">';
                    echo '<img src="../images/'
                        . $member["image"]
                        . '" alt="'
                        . $member["name"]
                        . ' Profile Picture">';
                    echo '</div>';
                    echo '<div class="profile-details">';
                    include "snippets/"
                        . strtolower($member["name"])
                        . "_snippet.php";
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>
</body>

</html>