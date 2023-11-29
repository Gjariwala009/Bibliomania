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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {

    if (!empty($_POST)) {
        $isValid = true;

        $name = clean($_POST["fname"]);
        $username = clean($_POST["username"]);
        $email = clean($_POST["email"]);
        $password = clean($_POST["psw"]);
        $confirm = clean($_POST["con-psw"]);

        $errorName = "<p style='color: red;' class='text-danger'>Please use letters only</p>";
        $errorUserName = "<p style='color: red;' class='text-danger'>Please use letters and apostrophes only</p>";
        $errorEmail = "<p style='color: red;' class='text-danger'>Please use a valid email id</p>";
        $errorPass =  "<p style='color: red;' class='text-danger'>Please use the correct format for the password</p>";
        $errorConfirmPass = "<p style='color: red;' class='text-danger'>Passwords did not match! Try again.</p>";
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
            <a href="index.php">
                <h1>
                    Welcome to Bibliomania
                </h1>
            </a>
        </div>
        <?php include "navigation.php"; ?>
    </header>
    <div class="container">
        <form action="" method="POST" class="signup-page">

            <label for="fname">Name: </label>
            <input type="text" id="fname" name="fname" placeholder="Enter your Name here"><br>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["register"])) {
                    if (!filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z]+( [a-zA-Z]+)*$/")))) {
                        echo $errorName;
                        $isValid = false;
                    }
                }
            }
            ?>

            <label for="username">Username: </label>
            <input type="text" id="username" name="username" placeholder="Enter your Username here(case sensitive)"><br>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["register"])) {
                    if (!filter_var($username, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-z'-]+$/")))) {
                        echo $errorUserName;
                        $isValid = false;
                    }
                }
            }
            ?>

            <label for="email">Email: </label>
            <input type="text" id="email" name="email" placeholder="Enter your Email Address here"><br>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["register"])) {
                    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/')))) {
                        echo $errorEmail;
                        $isValid = false;
                    }
                }
            }
            ?>

            <label for="psw">Password: </label>
            <input type="password" id="psw" name="psw" placeholder="Enter your Password here"><br>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["register"])) {
                    if (!filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{12,}$/")))) {
                        echo $errorPass;
                        $isValid = false;
                    }
                }
            }
            ?>

            <label for="con-psw">Confirm Password: </label>
            <input type="password" id="con-psw" name="con-psw" placeholder="Re-enter your Password here"><br>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["register"])) {
                    if ($password != $confirm) {
                        echo $errorConfirmPass;
                        $isValid = false;
                    }
                }
            }
            ?>

            <button type="submit" name="register" class="btn-primary">Register</button>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["register"])) {
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
            }
            ?>

            <div>
                <p>Already have an Account? <a href="login.php">Log in!</a>
                </p>
            </div>
        </form>
    </div>

</body>

</html>