<?php
session_start();
require "connection.php";

$userInfo = $_SESSION['userInfo'];

function clean($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $input;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {

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
        $hashedPassword = password_hash($password, PASSWORD_ARGON2I);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
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

            <h1><strong> Update your profile </strong></h1>

            <label for="fname">Name: </label>
            <input type="text" id="fname" name="fname" value=<?php echo $userInfo['fname'] ?>><br>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["update"])) {
                    if (!filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z]+( [a-zA-Z]+)*$/")))) {
                        echo $errorName;
                        $isValid = false;
                    }
                }
            }
            ?>

            <label for="username">Username: </label>
            <input type="text" id="username" name="username" value=<?php echo $userInfo['username'] ?>><br>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["update"])) {
                    if (!filter_var($username, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-z'-]+$/")))) {
                        echo $errorUserName;
                        $isValid = false;
                    }
                }
            }
            ?>

            <label for="email">Email: </label>
            <input type="text" id="email" name="email" value=<?php echo $userInfo['email'] ?>><br>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["update"])) {
                    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/')))) {
                        echo $errorEmail;
                        $isValid = false;
                    }
                }
            }
            ?>

            <label for="psw">Password: </label>
            <input type="password" id="psw" name="psw" placeholder="Enter your New Password here"><br>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["update"])) {
                    if (!filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{12,}$/")))) {
                        echo $errorPass;
                        $isValid = false;
                    }
                }
            }
            ?>

            <label for="con-psw">Confirm Password: </label>
            <input type="password" id="con-psw" name="con-psw" placeholder="Re-enter your New Password here"><br>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["update"])) {
                    if ($password != $confirm) {
                        echo $errorConfirmPass;
                        $isValid = false;
                    }
                }
            }
            ?>

            <button type="submit" name="update" class="btn-primary">Update</button>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["update"])) {
                    if ($isValid) {
                        $query = $pdo->prepare("UPDATE Users SET fname = ?, username = ?, email = ?, password = ?  WHERE username = ?");

                        $query->bindParam(1, $name, PDO::PARAM_STR);
                        $query->bindParam(2, $username, PDO::PARAM_STR);
                        $query->bindParam(3, $email, PDO::PARAM_STR);
                        $query->bindParam(4, $password, PDO::PARAM_STR);
                        $query->bindParam(5, $userInfo['username'], PDO::PARAM_STR);

                        if ($query->execute()) {
                            // Update successful
                            include "logout.php";
                            header("Location: login.php");
                            exit;
                            // Optionally, you might want to refresh the session data or perform other actions
                        } else {
                            // Handle update failure
                            echo "Error updating values: " . $userInfo['username'];
                        }
                    }
                }
            }
            ?>
        </form>
    </div>
</body>

</html>