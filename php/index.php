<?php
include("connection.php");

$nameErr = $emailErr = $passwordErr = "";
$name = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $day = $_POST['dia'];
    $month = $_POST['mes'];
    $year = $_POST['ano'];
    
    if (empty($_POST["full-name"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        header("Location: /ativ-som/php/cadaster.php");
        exit;
    }

    $fullName = $_SESSION["fullName"] = $_POST["full-name"];
    $email = $_SESSION["email"] = $_POST["email"];
    $password = $_POST["password"];
    $sex = $_POST["sex"];

    function getAge($day, $month, $year) {
        $idadeMedia = date("Y") - $year;
        if ($month < date('m') || ($month == date('m') && $day < date('d'))) {
            return $idadeMedia;
        } else {
            return $idadeMedia - 1;
        }
    }

    $age = getAge($day, $month, $year);
    echo "Idade calculada: " . $age;

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM clients WHERE clientEmail = '$email'";
    $result = mysqli_query($conn, $sql);

    if (!mysqli_num_rows($result) > 0) {
        $sql = "INSERT INTO CLIENTS (ClientName, Age, ClientEmail, clientPassword, clientSex)
        VALUES ('$fullName','$age','$email','$hash', '$sex')";
        mysqli_query($conn, $sql);
    } else {
        $_SESSION["emailErr"] = "Email já cadastrado";
        header("Location: /ativ-som/php/cadaster.php");
        exit;
    }

    header("Location: /ativ-som/php/home.php");
    exit;
}
?>