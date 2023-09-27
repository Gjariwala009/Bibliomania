<?php

$book_details = array(
    array("Book-1_f", "Book-2_f", "Book-3_f", "Book-4_f", "Book-5_f"),
    array("/images/Fiction/Better-than-the-movies.jpeg", "/images/Fiction/The_Fault_in_Our_Stars.jpg", "/images/Fiction/The_Great_Gatsby_Cover.jpg", "/images/Fiction/The-Love-Hypothesis.jpg", "/images/Fiction/To_Kill_a_Mockingbird.jpg"),
    array("Better Than The Movies Cover page", "The Fault in Our Stars Cover Page", "The Great Gatsby Cover Page", "The Love Hypothesis Cover Page", "To Kill A Mocking Bird Cover Page"),
    array("Better Than The Movies", "The Fault in Our Stars", "The Great Gatsby", "The Love Hypothesis", "To Kill a Mockingbird")
);

for ($i = 0; $i < 5; $i++) {
    echo "<div class='Book' >
    <a target='_blank' href='/includes/Book.php?id={$book_details[0][$i]}'>
        <img id='{$book_details[0][$i]}' src='{$book_details[1][$i]}' alt='{$book_details[2][$i]}'>
    </a>
    <div class='desc'>{$book_details[3][$i]}</div>
</div>";
}
