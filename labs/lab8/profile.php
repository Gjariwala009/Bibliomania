<?php
session_start();
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
    <link rel="stylesheet">
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