<?php

session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$book_IDs = array(

    array("Book-1_f", "Book-2_f", "Book-3_f", "Book-4_f", "Book-5_f"),
    array("Book-1_nf", "Book-2_nf", "Book-3_nf", "Book-4_nf", "Book-5_nf"),
    array("Book-1_r", "Book-2_r", "Book-3_r", "Book-4_r", "Book-5_r")

);

$book_details = array(

    array(

        array("images/Fiction/Better-than-the-movies.jpeg", "images/Fiction/The_Fault_in_Our_Stars.jpg", "images/Fiction/The_Great_Gatsby_Cover.jpg", "images/Fiction/The-Love-Hypothesis.jpg", "images/Fiction/To_Kill_a_Mockingbird.jpg"),
        array("Better Than The Movies Cover page", "The Fault in Our Stars Cover Page", "The Great Gatsby Cover Page", "The Love Hypothesis Cover Page", "To Kill A Mocking Bird Cover Page"),
        array("Better Than the Movies", "The Fault in Our Stars", "The Great Gatsby", "The Love Hypothesis", "To Kill a Mockingbird"),
        array("25.99", "30.99", "22.99", "21.99", "19.99"),
        array("978-1-5344-6762-0", "978-0-5254-7881-2", "978-0-7432-7356-5", "978-0-593-34548-5", "978-0-06-112008-4"),
        array("Lynn Painter", "John Green", "F. Scott Fitzgerald", "Ali Hazelwood", "Harper Lee"),
        array("May 4, 2021", "January 10, 2012", "April 10, 1925", "September 14, 2021", "July 11, 1960"),

    ),

    array(

        array("images/Non-Fiction/Atomic-Habits.jpeg", "images/Non-Fiction/Educated.jpg", "images/Non-Fiction/Sapiens.jpg", "images/Non-Fiction/Thinking.jpg", "images/Non-Fiction/Wright_Brothers.jpg"),
        array("Atomic Habits Cover page", "Educated Cover Page", "Sapiens Cover Page", "Thinking Cover Page", "Wright Brothers Cover Page"),
        array("Atomic Habits", "Educated", "Sapiens", "Thinking, Fast and Slow", "The Wright Brothers"),
        array("26.99", "33.99", "21.99", "27.99", "15.99"),
        array("978-0735211292", "978-0399590504", "978-0062316097", "978-0374275631", "978-1476728742"),
        array("James Clear", "Tara Westover", "Yuval Noah Harari", "Daniel Kahneman", "David McCullough"),
        array("October 16, 2018", "February 20, 2018", "February 10, 2015", "October 25, 2011", "May 5, 2015")

    ),
    array(

        array("images/Religious/Bhagavad-Gita.jpeg", "images/Religious/Bible.jpg", "images/Religious/The_Problem_of_Pain.jpg", "images/Religious/Quran.jpg", "images/Religious/Shrimad_Bhagavadam.jpg"),
        array("Bhagavad Gita Cover page", "Bible Cover Page", "The Problem of Pain Cover Page", "Quran Cover Page", "Shrimad Bhagavadam Cover Page"),
        array("Shrimad Bhagavad Gita", "Bible", "The Problem of Pain", "Quran", "Shrimad Bhagavadam"),
        array("29.99", "30.99", "25.99", "29.99", "49.99"),
        array("978-0-06-231082-1", "978-0-5254-7881-2", "978-0060652968", "978-0199535958", "9780912776279"),
        array("Traditionally attributed to Sage Vyasa.", "The Bible is a collection of sacred texts written by various authors over centuries.", "C.S. Lewis", "The Quran is considered the literal word of God as revealed to the Prophet Muhammad in the 7th century", "Traditionally attributed to Sage Vyasa."),
        array("5th century - 2nd centure BCE", "Year 1539 (approx.)", "First published in 1940", "origins in the 7th century", "January 1, 1978")

    )
);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['delete'])) {
        $deleteId = $_POST['delete'];

        // Find the index of the book to delete in the $_SESSION['cart'] array
        $indexToDelete = -1;
        foreach ($_SESSION['cart'] as $key => $book) {
            if (isset($book['id']) && $book['id'] == $deleteId) {
                unset($_SESSION['cart'][$key]);
                $indexToDelete = $key;
                break;
            }
        }

        // If found, remove the book from the $_SESSION['cart'] array
        if ($indexToDelete !== -1) {
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["quantity"])) {
        $quantity = $_POST["quantity"];
        $bookId = $_POST["book_id"];

        // Update the quantity in the $_SESSION['cart'] array
        foreach ($_SESSION['cart'] as $key => &$book) {
            if ($book['id'] == $bookId) {
                if ($quantity <= 0) {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    break;
                }
                $book['quantity'] = $quantity;
            }
        }
    }
}

if (
    $_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['emptyCart'])
    and $_POST['emptyCart'] == 'Empty Cart'
) {
    unset($_SESSION['cart']);
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
        include 'navigation.php' ?>
    </header>
    <div class="content">
        <table>
            <thead>
                <tr class="first-row">
                    <th>Product</th>
                    <th>Genre</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="items">
                <?php
                $totalPrice = 0;
                for ($iter = 0; $iter < count($_SESSION['cart']); $iter++) {
                    $totalPrice += floatval(substr($_SESSION['cart'][$iter]['price'], 1)) * $_SESSION['cart'][$iter]['quantity'];
                ?>
                    <tr>
                        <td><?php echo $_SESSION['cart'][$iter]['title']; ?></td>
                        <td><?php echo $_SESSION['cart'][$iter]['genre']; ?></td>
                        <td><?php echo $_SESSION['cart'][$iter]['price']; ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="book_id" value="<?php echo $_SESSION['cart'][$iter]['id']; ?>">
                                <input type="number" name="quantity" value="<?php echo $_SESSION['cart'][$iter]['quantity']; ?>" min="0" max="10">
                                <input type="submit" value="Update">
                            </form>
                        </td>
                        <td><?php echo "$" . number_format(floatval(substr($_SESSION['cart'][$iter]['price'], 1)) * $_SESSION['cart'][$iter]['quantity'], 2); ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="delete" value="<?php echo $_SESSION['cart'][$iter]['id']; ?>">
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><strong>Total:</strong></td>
                    <td>
                        <strong><?php echo "$" . number_format($totalPrice, 2); ?></strong>
                    </td>
                </tr>
                <tr>
                    <form method="post" action="cart.php" class="empty">
                        <input type="hidden" name="empty" value="empty">
                        <input type="submit" name="emptyCart" value="Empty Cart" class='btn btn-success'>
                    </form>
                </tr>
            </tfoot>
        </table>
    </div>

    <footer class='footer'>
        <?php include 'footer.php';
        footer(); ?>
    </footer>
</body>

</html>