<?php
/**
 * Authentication screen
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
    <title>Authentication</title>
    <style>
        <?php require '../style.css'; ?>
        <?php require '../word_puzzle/secret_page/secret_page.css'; ?>
    </style>
    <script type='module' src="./authentication.js"></script>
</head>

<body>
    <?php require "../components/navbar/navbar.php"; ?>
    <div class="container">
        <form class="authentication-form">
            <h1 class="main-heading mx-auto alternate" style="width: 400px; font-size: 2.0rem">
                Authentication
            </h1>
            <div class="form-items mx-auto" style="width: 400px;">
                <input type="text" id="field" class="form-control"><br><br>
                <input type="submit" value="Submit" id="btn" class="btn btn-primary mx-auto">
            </div>
        </form>
    </div>
</body>

</html>
