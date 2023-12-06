<?php
session_start();
require "connection.php";

$userInfo = $_SESSION['userInfo'];

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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

            </div>
        </div>
    </div>
</body>

</html>