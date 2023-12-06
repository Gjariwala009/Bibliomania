<?php
session_start();

include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $message = "";

    $query = $pdo->prepare("SELECT * FROM Users WHERE username = ? AND password = ?");
    $query->execute([$username, $password]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $_SESSION['userInfo'] = $user;
        setcookie('username', $username, time() + (86400 * 365));
        header("Location: index.php");
        exit();
    } else {
        $message = "<p style='color: red;' class='text-danger text-center'>Invalid username or password.</p>";
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
        <form method="POST" class="login-page">

            <?php
            if (!empty($message)) {
                echo $message;
            }
            ?>

            <label for="username">Username: </label>
            <input type="text" id="username" name="username" placeholder="Enter your Username here(case sensitive)"><br>

            <label for="psw">Password: </label>
            <input type="password" id="psw" name="password" placeholder="Enter your Password here"><br>

            <button type="submit" class="btn-primary" name="login">Login</button>

            <div>
                <p>Not have an Account? <a href="signup.php">Sign up!</a>
                </p>
            </div>
        </form>
    </div>



</body>

</html>