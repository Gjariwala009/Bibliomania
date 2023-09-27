<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bibliomania</title>
    <meta name="description" content="Title of Site">
    <meta name="author" content="Author Name">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style_book.css">
    <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
</head>

<body>
    <header class="header">
        <div class="title">
            <h1>
                <p>Welcome to Bibliomania</p>
            </h1>
        </div>
        <?php include '/Applications/MAMP/htdocs/includes/navigation.php' ?>
    </header>

    <section class="content">
        <?php
        include '/Applications/MAMP/htdocs/includes/populate.php' ?>
        <li>
            <button class="button Buy" onclick="submit">Buy Now</button>
            <button class="button Cart" onclick="submit"> Add To Cart</button>
        </li>
        </ul>
        </div>
    </section>

    <?php include '/Applications/MAMP/htdocs/includes/footer.php' ?>
</body>

</html>