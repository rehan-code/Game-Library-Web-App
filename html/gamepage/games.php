<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Game</title>
    <style>
        <?php include '../style.css'; ?>
    </style>
</head>
<body>
    <?php include("../components/navbar/navbar.php"); ?>

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
                      <div class="btn-wrapper">
                        <form action="../waldo/waldo_game_3.php" method="get">
                            <input type="submit" class="btn view-more-btn" value="Start Game">
                        </form>
                      </div>
                  </div>
                </div>
        </div>
    </section>
</body>
</html>