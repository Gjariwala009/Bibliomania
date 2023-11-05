<?php

session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
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

<body>
    <header class="header">
        <div class="title">
            <h1>
                Welcome to Bibliomania
            </h1>
        </div>

        <?php
        if (!isset($_COOKIE['username'])) {
            $_COOKIE['usr'] = 0;
        } else {
            $username = $_COOKIE['username'];
            $userCookieName = "visits:$username";
            if (!isset($_COOKIE[$userCookieName])) {
                $count = 1;
            } else {
                $count = $_COOKIE[$userCookieName] + 1;
            }
            echo "<h2 class='text'> Welcome back $username! Visit number $count. </h2>";
            setcookie($userCookieName, $count, time() + (86400 * 365));
        }
        ?>
        <?php include 'navigation.php' ?>
    </header>

    <div class="content">
        <?php
        $genre = "Featured";
        if (isset($_GET['genre'])) {
            $genre = $_GET['genre'];
        }
        if ($genre == "Fiction") {
            include 'Book/Fiction_Book.php';
        } else if ($genre == "Non-Fiction") {
            include 'Book/Non_Fiction_Book.php';
        } else if ($genre == "Religious") {
            include 'Book/Religious_Book.php';
        } else {
            include 'Book/Featured_Book.php';
        }
        ?>
    </div>
    <footer class='footer'>

        <?php include 'footer.php';
        footer(); ?>
    </footer>
</body>

</html>