<?php
    include("connection.php");
    session_start();

    if (!isset($_SESSION["emailNotFound"])) {
        $_SESSION["emailNotFound"] = "";
        $_SESSION['password'] = "";
    };
?>

<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];

            $email = $_SESSION['email'];
            $password = $_SESSION['password'];

            echo $email;

            $sql = "SELECT * FROM clients WHERE clientEmail = '$email'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $hash = $row["clientPassword"];

                if (password_verify($password, $hash)) {
                    header("Location: home.php");
                    exit;
                } else {
                    $_SESSION["emailNotFound"] = "Senha incorreta";
                }
            } else {
                $_SESSION["emailNotFound"] = "Email não cadastrado";
            }
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="/ativ-som/css/style.css">
</head>
<body class="black">
    <header class="login-header black">
        <a class="home black" href="#" formtarget="_top" value="おいしい cafe">おいしい cafe</a>
    </header>

    <main class="main-login black">
        <div id="login-card" class="login white white-shadow">
            <h1>Login</h1>
            <?php echo $_SESSION["emailNotFound"]; ?>

            <form id="form-login" class="white" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="input-form white">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" placeholder="Email" required>
                </div>  

                <div class="input-form white">
                    <label for="senha">Password</label>
                    <input type="password" name="password" placeholder="Senha" required>
                </div>

                <input class="submit-login white" type="submit" value="Enviar">
            </form>

            <a href="cadaster.php">Don't have an account? Register here!</a>
        </div>
    </main>

    <footer class="footer-login black">
        <p>Made by Gustavo Feitosa Correia</p>
    </footer>
    <script src="/ativ-som/script/index.js"></script>
</body>
</html>