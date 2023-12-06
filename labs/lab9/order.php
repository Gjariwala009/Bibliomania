<?php
session_start();

// Check if the user is logged in, redirect to login page if not
if (!isset($_SESSION['userInfo'])) {
    header("Location: login.php");
    exit();
}

include "connection.php"; // Include your database connection file

$userId = $_SESSION['userInfo']['userId'];

$query = $pdo->prepare("SELECT * FROM `Order` WHERE userId = ?");
$query->execute([$userId]);
$orders = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Order History</title>
    <meta name="description" content="Order History">
    <meta name="author" content="Author Name">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="header">
        <div class="title">
            <a href="index.php">
                <h1>Welcome to Bibliomania</h1>
            </a>
        </div>
        <?php include "navigation.php"; ?>
    </header>

    <div class="container">
        <h2>Order History</h2>

        <?php if (count($orders) > 0) : ?>
            <table border="1">
                <tr>
                    <th>Order ID</th>
                    <th>ISBN</th>
                    <th>Date</th>
                </tr>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?php echo $order['orderId']; ?></td>
                        <td><?php echo $order['isbn']; ?></td>
                        <td><?php echo $order['date']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>No orders found.</p>
        <?php endif; ?>
    </div>
</body>

</html>