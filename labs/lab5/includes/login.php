<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usr"])) {
    $username = $_POST["usr"];
    setcookie("username", $username, time() * 3600);
    header("Location: ../index.php");
    exit();
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
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="login-page">
    <header class="header">
        <div class="title">
            <h1>
                Welcome to Bibliomania
            </h1>
        </div>
    </header>

    <div class="container">
        <form action="../index.php" class="login-page">

            <label for="usr">Username: </label>
            <input type="text" id="usr" name="usr"><br>

            <label for="psw">Password: </label>
            <input type="password" id="psw" name="psw"><br>

            <button type="submit" class="btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>