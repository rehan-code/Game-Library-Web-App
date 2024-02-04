<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Instruction</title>
        <style>
            <?php include '../style.css'; ?>
            <?php include '../about_us/about_us.css'; ?>
            <?php include 'instruction.css'; ?>
        </style>
    </head>

    <body>
    <?php include("../components/navbar/navbar.php"); ?>

    <section class="wrapper-instruction">
        <div class="container-instruction">
            <div class="header-container">
                <div class="overlay1"></div>
                <h1 class="about-main-heading1">INSTRUCTIONS</h1>
            </div>
            <h2 class="heading">Overview</h2>
            <p class="heading-paragraph">
                "Where's Waldo?" is a puzzle book series created by British illustrator Martin Handford. 
                The books feature detailed, crowded scenes filled with people, objects, 
                and various activities, and the goal is to find the character Waldo—a glassed man wearing eccentric red and white striped
                clothes—within the image.
            </p>
            <h2 class="heading">Objective</h2>
            <p class="heading-paragraph">
                Find Waldo hiding within each scene:
                <ul class="list-class center-text">
                    <li><strong>Scene 1:</strong> Find the Lion in the wild </li>
                    <li><strong>Scene 2:</strong> Find Mickey Mouse in disney land</li>
                    <li><strong>Scene 3:</strong> Find Ivan between the avatars </li>
                </ul>
            </p>

            <h2 class="heading">Instructions</h2>
            <div class="bottom-margin-setting">
                <div class="rounded-box">
                    <p> 
                        <dl class="list-class">
                            <li> Click on Waldo using the <strong>Mouse</strong> button upon locating Waldo</li>
                            <li> Double-click to zoom in</li>
                            <li> Failing to click on Waldo deducts <strong>1 point</strong> from your score</li>
                            <li> Losing all points results in a <strong>Game Over</strong></li>
                        </dl>
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