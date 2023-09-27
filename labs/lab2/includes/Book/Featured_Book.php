<div class="main-content">
    <a target="_blank" href="images/perfect-website-for-a-book-v2.jpg" alt="House on a Book with trees around">
        <img src="images/perfect-website-for-a-book-v2.jpg">
    </a>

</div>
<div class="heading">
    <h2 class="featured">Featured This Week!</h2>
</div>

<?php

$book_details = array(
    array("Book-1_f", "Book-1_r", "Book-1_nf"),
    array("images/Fiction/Better-than-the-movies.jpeg", "images/Religious/Bhagavad-Gita.jpeg", "images/Non-Fiction/Atomic-Habits.jpeg"),
    array("Better Than The Movies", "Shrimad Bhagavad Gita", "Atomic Habits"),
    array("Better Than The Movies Cover page", "Shrimad Bhagavad Gita Cover Page", "Atomic Habits Cover Page")
);

for ($i = 0; $i < 3; $i++) {
    echo "<div class='Book' id='{$book_details[0][$i]}'>
    <a target='_blank' href='/includes/Book.php?id={$book_details[0][$i]}'>
        <img src='{$book_details[1][$i]}' alt='{$book_details[3][$i]}' onclick='getImageId('{$book_details[0][$i]}')'>
    </a>
    <div class='desc'>{$book_details[2][$i]}</div>
</div>";
}
