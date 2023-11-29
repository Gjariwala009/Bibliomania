<?php
require "connection.php";

function clean($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
$isValid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST)) {
        $isValid = true;


        $name = clean($_POST["fname"]);
        $username = clean($_POST["username"]);
        $email = clean($_POST["email"]);
        $password = clean($_POST["psw"]);
        $confirm = clean($_POST["con-psw"]);

        $regexName = "/^[a-zA-Z]+( [a-zA-Z]+)*$/";
        $errorName = "<p class=\"text-danger\">Please use letters only</p>";

        $regexUserName = "/^[a-zA-z'-]+$/";
        $errorUserName = "<p class=\"text-danger\">Please use letters and apostrophes only</p>";

        $regexEmail = "/^[A-Za-z0-9]+@[a-zA-Z]+\.[A-Za-z]{2,5}$/";
        $errorEmail = "<p class=\"text-danger\">Please use a valid email id</p>";

        $regexPass = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{12,}$/";
        $errorPass =  "<p class=\"text-danger\">Please use the correct format for the password</p>";

        $errorConfirmPass = "<p class=\"text-danger\">Passwords did not match! Try again.</p>";

        //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    }

    if ($isValid) {
        $queryUsers = $pdo->prepare("INSERT INTO Users (fname, username, email, password) VALUES (?, ?, ?, ?)");

        if (!$queryUsers->execute([$name, $username, $email, $password])) {
            echo "Database error: " . implode(" ", $queryUsers->errorInfo());
            exit();
        }

        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bibliomania</title>
    <meta name="description" content="Title of Site">
    <meta name="author" content="Author Name">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="login-page">
    <header class="header">
        <div class="title">
            <h1>
                Welcome to Bibliomania
            </h1>
        </div>
    </header>

    <div class="container col-md-6">
        <form action="" method="POST" class="signup-page">

            <label for="fname">Name: </label>
            <input type="text" id="fname" name="fname"><br>

            <label for="username">Username: </label>
            <input type="text" id="username" name="username"><br>

            <label for="email">Email: </label>
            <input type="text" id="email" name="email"><br>

            <label for="psw">Password: </label>
            <input type="password" id="psw" name="psw"><br>

            <label for="con-psw">Confirm Password: </label>
            <input type="password" id="con-psw" name="con-psw"><br>

            <button type="submit" class="btn-primary">Register</button>
        </form>
    </div>

</body>

</html>