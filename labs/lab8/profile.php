<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "connection.php";

if (!isset($_SESSION['userInfo'])) {
    header("Location: login.php");
    exit();
}

$userInfo = $_SESSION['userInfo'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Welcome, <?php echo $userInfo['fname']; ?></h2>
                <p><strong>Username:</strong> <?php echo $userInfo['username']; ?></p>
                <p><strong>Email:</strong> <?php echo $userInfo['email']; ?></p>
            </div>
        </div>
    </div>
</body>

</html>