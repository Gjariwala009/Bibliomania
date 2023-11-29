<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bibliomania</title>
    <meta name="description" content="Title of Site">
    <meta name="author" content="Author Name">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style_book.css">
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
        <?php
        include 'navigation.php'
        ?>
    </header>

    <div class="content">
        <?php
        include 'populate.php' ?>
    </div>

    <footer class='footer'>
        <?php include 'footer.php';
        footer(); ?>
    </footer>
</body>

</html>