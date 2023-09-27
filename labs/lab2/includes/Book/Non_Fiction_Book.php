<?php

$book_details = array(
    array("Book-1_nf", "Book-2_nf", "Book-3_nf", "Book-4_nf", "Book-5_nf"),
    array("/images/Non-Fiction/Atomic-Habits.jpeg", "/images/Non-Fiction/Educated.jpg", "/images/Non-Fiction/Sapiens.jpg", "/images/Non-Fiction/Thinking.jpg", "/images/Non-Fiction/Wright_Brothers.jpg"),
    array("Atomic Habits Cover page", "Educated Cover Page", "Sapiens Cover Page", "Thinking Cover Page", "Wright Brothers Cover Page"),
    array("Atomic Habits", "Educated: a Memoir", "Sapiens", "Thinking, Fast and Slow", "The Wright Brothers")
);

for ($i = 0; $i < 5; $i++) {
    echo "<div class='Book' id='{$book_details[0][$i]}'>
    <a target='_blank' href= '/includes/Book.php?id={$book_details[0][$i]}'>
        <img src='{$book_details[1][$i]}' alt='{$book_details[2][$i]}'>
    </a>
    <div class='desc'>{$book_details[3][$i]}</div>
</div>";
}
