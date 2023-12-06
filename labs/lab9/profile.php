<?php
session_start();
require "connection.php";

if (!isset($_SESSION['userInfo'])) {
    header("Location: login.php");
    exit();
}

$userInfo = $_SESSION['userInfo'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['change'])) {
        header("Location: update.php");
        exit;
    } else if (isset($_POST['delete'])) {
        $username = $userInfo['username'];

        $query = $pdo->prepare("DELETE FROM Users WHERE username = ?");
        $query->bindParam(1, $username, PDO::PARAM_STR);
        if ($query->execute()) {
            // Deletion successful
            include "logout.php";
            header("Location: login.php");
            exit;
            // Optionally, you might want to log the user out or perform any other necessary actions
        } else {
            // Handle deletion failure
            echo "Error deleting account: " . $username;
        }
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Welcome, <?php echo $userInfo['fname']; ?></h2>
                <p><strong>Username:</strong> <?php echo $userInfo['username']; ?></p>
                <p><strong>Email:</strong> <?php echo $userInfo['email']; ?></p>
            </div>
        </div>

        <div class="row-2 justify-content-center">
            <form method="POST" class="change">
                <input type="submit" name="change" class="btn-primary" value="Update">
                <input type="submit" name="delete" class="btn-secondary" value="Delete Account">
            </form>
        </div>
    </div>
</body>

</html>