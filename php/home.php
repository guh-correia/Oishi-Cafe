<?php
    session_start();
    if(!isset($_SESSION["email"])) {
        header("Location: /ativ-som/php/login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>おいしい cafe</title>

    <link rel="stylesheet" href="/ativ-som/css/style.css">
</head>
    <body>
        <header>
            <a class="home" href="#home" formtarget="_top" value="おいしい cafe">おいしい cafe</a>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="form.php">Work with us</a></li>
                    <li><a href="userData.php">Account</a></li>
                </ul>
            </nav>
        </header>

        <main id="home">
            <div class="background-video">
                <div class="title">
                    <h1>おいしい cafe</h1>
                    <p>another way of making coffee</p>
                    <a class="see-more" href="about.php">See more
                    </a>
                </div>
                <video autoplay muted loop>
                    <source src="https://youtu.be/mvLeCSqwTwo" type="video/mp4" alt="cafe video">
            </div>
        </main>
    </body>
</html>