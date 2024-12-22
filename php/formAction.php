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
            <a class="home" href="home.php" formtarget="_top" value="おいしい cafe">おいしい cafe</a>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="form.php">Work with us</a></li>
                    <li><a href="userData.php">Account</a></li>
                </ul>
            </nav>
        </header>
        
        <main>
            <!-- divs para dar o brilho no fundo da pag -->
            <div class="blur"></div>
            <div class="blur2"></div>

            <div class="card">
                <h1 id="test" class="card-title">All Done!</h1>

                <div id="user-info">
                    <p id="nome-user"><b>Name</b>: </p>
                    <p id="age-user"><b>Birth</b>: </p>
                    <p id="sex-user"><b>Sex</b>: </p>
                    <p id="email-user"><b>Email</b>: </p>
                </div>

                <p class="card-message">Now, just wait and our team will send you an email where you can submit your resume. We are looking forward to having you become part of our family!</p>

                <span class="card-span">See you soon!</span>
            </div>
        </main>
        <script src="/ativ-som/script/formAction.js"></script>
    </body>
</html>