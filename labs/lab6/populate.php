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

// echo "Number of books: $count";

$book_details = array(

    array(

        array("images/Fiction/Better-than-the-movies.jpeg", "images/Fiction/The_Fault_in_Our_Stars.jpg", "images/Fiction/The_Great_Gatsby_Cover.jpg", "images/Fiction/The-Love-Hypothesis.jpg", "images/Fiction/To_Kill_a_Mockingbird.jpg"),
        array("Better Than The Movies Cover page", "The Fault in Our Stars Cover Page", "The Great Gatsby Cover Page", "The Love Hypothesis Cover Page", "To Kill A Mocking Bird Cover Page"),
        array("Better Than the Movies", "The Fault in Our Stars", "The Great Gatsby", "The Love Hypothesis", "To Kill a Mockingbird"),
        array("$25.99", "$30.99", "$22.99", "$21.99", "$19.99"),
        array("978-1-5344-6762-0", "978-0-5254-7881-2", "978-0-7432-7356-5", "978-0-593-34548-5", "978-0-06-112008-4"),
        array("Lynn Painter", "John Green", "F. Scott Fitzgerald", "Ali Hazelwood", "Harper Lee"),
        array("May 4, 2021", "January 10, 2012", "April 10, 1925", "September 14, 2021", "July 11, 1960"),

    ),

    array(

        array("images/Non-Fiction/Atomic-Habits.jpeg", "images/Non-Fiction/Educated.jpg", "images/Non-Fiction/Sapiens.jpg", "images/Non-Fiction/Thinking.jpg", "images/Non-Fiction/Wright_Brothers.jpg"),
        array("Atomic Habits Cover page", "Educated Cover Page", "Sapiens Cover Page", "Thinking Cover Page", "Wright Brothers Cover Page"),
        array("Atomic Habits", "Educated", "Sapiens", "Thinking, Fast and Slow", "The Wright Brothers"),
        array("$26.99", "$33.99", "$21.99", "$27.99", "$15.99"),
        array("978-0735211292", "978-0399590504", "978-0062316097", "978-0374275631", "978-1476728742"),
        array("James Clear", "Tara Westover", "Yuval Noah Harari", "Daniel Kahneman", "David McCullough"),
        array("October 16, 2018", "February 20, 2018", "February 10, 2015", "October 25, 2011", "May 5, 2015")

    ),
    array(

        array("images/Religious/Bhagavad-Gita.jpeg", "images/Religious/Bible.jpg", "images/Religious/The_Problem_of_Pain.jpg", "images/Religious/Quran.jpg", "images/Religious/Shrimad_Bhagavadam.jpg"),
        array("Bhagavad Gita Cover page", "Bible Cover Page", "The Problem of Pain Cover Page", "Quran Cover Page", "Shrimad Bhagavadam Cover Page"),
        array("Shrimad Bhagavad Gita", "Bible", "The Problem of Pain", "Quran", "Shrimad Bhagavadam"),
        array("$29.99", "$30.99", "$25.99", "$29.99", "$49.99"),
        array("978-0-06-231082-1", "978-0-5254-7881-2", "978-0060652968", "978-0199535958", "9780912776279"),
        array("Traditionally attributed to Sage Vyasa.", "The Bible is a collection of sacred texts written by various authors over centuries.", "C.S. Lewis", "The Quran is considered the literal word of God as revealed to the Prophet Muhammad in the 7th century", "Traditionally attributed to Sage Vyasa."),
        array("5th century - 2nd centure BCE", "Year 1539 (approx.)", "First published in 1940", "origins in the 7th century", "January 1, 1978")

    )
);

if (isset($_POST['action']) and $_POST['action'] == 'Buy') {
    $key = array(-1, -1, -1);
    if (in_array($_POST['id'], $book_IDs[0])) {
        $key[0] = 0;
        $key[1] = array_search($_POST['id'], $book_IDs[0]);
        $key[2] = "Fiction";
    } else if (in_array($_POST['id'], $book_IDs[1])) {
        $key[0] = 1;
        $key[1] = array_search($_POST['id'], $book_IDs[1]);
        $key[2] = "Non-Fiction";
    } else {
        $key[0] = 2;
        $key[1] = array_search($_POST['id'], $book_IDs[2]);
        $key[2] = "Religious";
    }

    for ($k = 0; $k < count($_SESSION['cart']); $k++) {
        if ($_POST['id'] == $_SESSION['cart'][$k]['id']) {
            $_SESSION['cart'][$k]['quantity']++;
            $key[1] = -1;
            break;
        }
    }
    if ($key[1] != -1) {
        $_SESSION['cart'][] = array("title" => $book_details[$key[0]][2][$key[1]], "price" => $book_details[$key[0]][3][$key[1]], "genre" => $key[2], "quantity" => 1, "id" => $_POST['id']);
    }
}

$num1;
$num2;
$genre;



if (isset($_GET['id'])) {
    $imageId = $_GET['id'];
    // Process the image ID (e.g., save it to a database, perform actions based on the ID)

    if ($imageId == "Book-1_f") {
        $genre = "Young Adult Fiction";
        $num1 = 0;
        $num2 = 0;
    } else if ($imageId == "Book-2_f") {
        $genre = "Young Adult Fiction";
        $num1 = 0;
        $num2 = 1;
    } else if ($imageId == "Book-3_f") {
        $genre = "Young Adult Fiction";
        $num1 = 0;
        $num2 = 2;
    } else if ($imageId == "Book-4_f") {
        $genre = "Young Adult Fiction";
        $num1 = 0;
        $num2 = 3;
    } else if ($imageId == "Book-5_f") {
        $genre = "Young Adult Fiction";
        $num1 = 0;
        $num2 = 4;
    }

    if ($imageId == "Book-1_nf") {
        $genre = "Non-Fiction";
        $num1 = 1;
        $num2 = 0;
    } else if ($imageId == "Book-2_nf") {
        $genre = "Non-Fiction";
        $num1 = 1;
        $num2 = 1;
    } else if ($imageId == "Book-3_nf") {
        $genre = "Non-Fiction";
        $num1 = 1;
        $num2 = 2;
    } else if ($imageId == "Book-4_nf") {
        $genre = "Non-Fiction";
        $num1 = 1;
        $num2 = 3;
    } else if ($imageId == "Book-5_nf") {
        $genre = "Non-Fiction";
        $num1 = 1;
        $num2 = 4;
    }

    if ($imageId == "Book-1_r") {
        $genre = "Religious";
        $num1 = 2;
        $num2 = 0;
    } else if ($imageId == "Book-2_r") {
        $genre = "Religious";
        $num1 = 2;
        $num2 = 1;
    } else if ($imageId == "Book-3_r") {
        $genre = "Religious";
        $num1 = 2;
        $num2 = 2;
    } else if ($imageId == "Book-4_r") {
        $genre = "Religious";
        $num1 = 2;
        $num2 = 3;
    } else if ($imageId == "Book-5_r") {
        $genre = "Religious";
        $num1 = 2;
        $num2 = 4;
    }

    echo "<div class='Book_Img'>
        <a>
            <img src='{$book_details[$num1][0][$num2]}' alt='{$book_details[$num1][1][$num2]}'>
        </a>
        <div class='desc'>{$book_details[$num1][2][$num2]}(Hardcover)</div>
    </div>
    <div class='Book_details'>
        <ul>
            <li>
                <h3>Price: {$book_details[$num1][3][$num2]}</h3>
            </li>
            <li>
                <p>ISBN Number:- {$book_details[$num1][4][$num2]}</p>
            </li>
            <li>
                <p>Author:- {$book_details[$num1][5][$num2]}</p>
            </li>
            <li>
                <p>Genre:- $genre</p>
            </li>
            <li>
                <p>Pulication date:- {$book_details[$num1][6][$num2]}</p>
            </li>
            <li>
                <form method='post' action=''>
                    <input type='hidden' name='id' value='$imageId'>
                    <input type='submit' name='action' value='Buy' class='btn btn-success'>
                </form>
        </li>
        </ul>
    </div>";
}
