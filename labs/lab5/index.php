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
    <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
</head>

<body>
    <header class="header">
        <div class="title">
            <h1>
                Welcome to Bibliomania

            </h1>
            <?php
            if (isset($input) && !empty($input)) {
                echo "<h2>Welcome back " . $input . "</h2>";
            }
            ?>
        </div>
        <?php include 'includes/navigation.php' ?>
    </header>

    <div class="content">
        <?php
        $genre = "Featured";
        if (isset($_GET['genre'])) {
            $genre = $_GET['genre'];
        }
        if ($genre == "Fiction") {
            include 'includes/Book/Fiction_Book.php';
        } else if ($genre == "Non-Fiction") {
            include 'includes/Book/Non_Fiction_Book.php';
        } else if ($genre == "Religious") {
            include 'includes/Book/Religious_Book.php';
        } else {
            include 'includes/Book/Featured_Book.php';
        }
        ?>
    </div>

    <?php include 'includes/footer.php' ?>
</body>

</html>