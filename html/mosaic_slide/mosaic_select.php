<?php
/**
 * Mosaic Slide stage select screen
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Game</title>
    <style>
        <?php require '../style.css'; ?>
    </style>
</head>

<body>
    <?php require "../components/navbar/navbar.php"; ?>

    <section class="container">
        <div class="grid-item-1-center">
            <h1 class="main-heading">
                <span>Mosaic Slide</span>
            </h1>
            <p class="info-text">
            In "Mosaic slide" players 
            are tasked with reassembling scrambled images by sliding 
            small tiles within a grid to form the complete picture. 
            With each move, players must strategically slide the tiles 
            into empty spaces, aiming to align them in the correct order. 
            As players progress through increasingly challenging levels, 
            they'll encounter a variety of images to reconstruct, ranging 
            from landscapes to famous artworks. With intuitive controls 
            and captivating gameplay, SlideMaster offers a stimulating 
            puzzle-solving experience suitable for all ages. Are you 
            ready to take on the challenge and master the art of 
            slide puzzles?<br>
            </p>
            <h1 class="main-heading">
                <span>Instruction</span>
            </h1>
            <p>
                <ul class="instruction-list">
                    <li class="instruction-item">
                        <strong>Objective:</strong> Rearrange scrambled 
                        tiles within the grid to form the complete picture.
                    </li>
                    <li class="instruction-item">
                        <strong>Tile Movement:</strong> Click or tap 
                        tiles to slide them into adjacent empty spaces.
                    </li>
                    <li class="instruction-item">
                        <strong>Strategy: </strong> Plan moves 
                        carefully, considering how each tile's movement 
                        affects others.
                    </li>
                    <li class="instruction-item">
                        <strong>Completion:</strong> Solve the puzzle by 
                        arranging all tiles to form the complete image.
                    </li>
                    <li class="instruction-item">
                        <strong>Progression:</strong> Advance through 
                        increasingly challenging levels with larger 
                        grids and complex images.
                    </li>
                    <li class="instruction-item">
                        <strong>Hint Button:</strong> Press the light
                        bulb-shaped Hint Button to receive a clue about
                        the computer science word to guess.
                    </li>
                </ul>
            </p>
            <br>
            <h1 class="main-heading">
                <span>Stages</span>
            </h1>
            <div class="movie-card movie-card-mosaic-1" 
            onclick="window.location.href='stages/stage_1.php';">
                <h1 class="main-heading-2">
                    Are you ready?
                </h1>
            </div>
        </div>
    </section>
</body>

</html>