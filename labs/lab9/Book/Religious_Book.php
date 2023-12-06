<?php

$book_details = array(
    array("Book-1_r", "Book-2_r", "Book-3_r", "Book-4_r", "Book-5_r"),
    array("images/Religious/Bhagavad-Gita.jpeg", "images/Religious/Bible.jpg", "images/Religious/The_Problem_of_Pain.jpg", "images/Religious/Quran.jpg", "images/Religious/Shrimad_Bhagavadam.jpg"),
    array("Bhagavad Gita Cover page", "Bible Cover Page", "The Problem of Pain Cover Page", "Quran Cover Page", "Shrimad Bhagavadam Cover Page"),
    array("Bhagavad Gita", "Bible", "The Problem of Pain", "Quran", "Shrimad Bhagavadam")
);

for ($i = 0; $i < 5; $i++) {
    echo "<div class='Book' id='{$book_details[0][$i]}'>
    <a target='_parent' href= 'Book.php?id={$book_details[0][$i]}'>
        <img src='{$book_details[1][$i]}' alt='{$book_details[2][$i]}'>
    </a>
    <div class='desc'>{$book_details[3][$i]}</div>
</div>";
}
