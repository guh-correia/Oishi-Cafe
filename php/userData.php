<?php
    include("connection.php");
    session_start();
    if(!isset($_SESSION["email"])) {
        header("Location: /ativ-som/php/login.php");
        exit;
    }

    $email = $_SESSION["email"];

    $sql = "SELECT * FROM clients WHERE clientEmail = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row["ClientName"];
        $sex = $row["clientSex"];
        $age = $row["Age"];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        header("location: /ativ-som/php/login.php");
        session_destroy();
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Data</title>

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
                <li><a href="#user-data-card">Account</a></li>
            </ul>
        </nav>
    </header>

    <main class="user-data">
        <div id="user-data-card">   
            <h1 class="title-userData">Your Data</h1>

            <?php 
            echo "<span>Name: " . $name .  "</span>";
            echo "<span>Email: " . $email . "</span>";
            echo "<span>Sex: " . $sex . "</span>";
            echo "<span>Age: " . $age . "</span>";
            echo $_SERVER["REQUEST_METHOD"]
            ?>

            <div class="logout">
                <a href="changeUserData.php">Change information</a>

                <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
                    <input type="submit" value="Logout">
                </form>
            </div>
        </div>
    </main>
</body>
</html>