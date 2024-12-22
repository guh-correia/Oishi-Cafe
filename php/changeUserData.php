<?php
    session_start();
    if(isset($_SESSION["email"])) {
        include("connection.php");

        $oldEmail = $_SESSION["email"];

        $sql = "SELECT * FROM clients WHERE clientEmail = '$oldEmail'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $name = $row["ClientName"];
            $sex = $row["clientSex"];
            $age = $row["Age"];
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["age"])) {
                header("Location: /ativ-som/php/changeUserData.php");
                exit;
            }

            $fullName = $_SESSION["fullName"] = $_POST["name"];
            $password = $_SESSION["password"] =  $_POST["password"];
            $age = $_SESSION["age"] =  $_POST["age"];
            $newEmail = $_SESSION["email"] = $_POST["email"];
            $sex = $_SESSION["sex"] = $_POST["sex"];

            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "UPDATE clients
                    SET ClientName = '$fullName', Age = '$age', ClientEmail = '$newEmail', clientPassword = '$hash', clientSex = '$sex'
                    WHERE ClientEmail = '$oldEmail';";
            $result = mysqli_query($conn, $sql);
            header("Location: /ativ-som/php/userData.php");
            exit;
        }
    } else {
        header("Location: /ativ-som/php/login.php");
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

    <main class="change-user-data">
        <div id="change-user-data-card">
            <h1 class="title-userData">Your Data</h1>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                <div class="input-userData">
                    <label for="name">Name</label>
                    <input required name="name" value="<?php echo $name ?>"></input>
                </div>

                <div class="input-userData">
                    <label for="name">Email</label>
                    <input required type="email" name="email" value="<?php echo $oldEmail ?>"></input>
                </div>

                <div class="input-userData">
                    <label for="name">Gender</label>
                    <select type='text' id="changeSex" name='sex' placeholder='Gender' required>
                            <option value="Man">Man</option>
                            <option value="Woman">Woman</option>
                            <option value="Other">Other</option>
                        </select>
                </div>

                <div class="input-userData">
                    <label for="name">Age</label>
                    <input type="number" required name="age" value="<?php echo $age ?>"></input>
                </div>

                <div class="input-userData">
                    <label for="password">New Password</label>
                    <input type="password" name="password" value="" required></input>
                </div>

                <div class="logout">
                    <a href="userData.php">Go Back</a>
                    <input type="submit" value="Submit">
                </div>
            </div>
        </form>
    </main>
</body>
</html>