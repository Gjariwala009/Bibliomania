<?php

// Check if a cookie named 'visits' has been set
// If the cookie does not exist then create one,
// and set value to 0
if (!isset($_COOKIE['username'])) {
    $_COOKIE['username'] = "";
}

$input = $_POST['user-input'];
setcookie("username", $input, time() + 3600 * 24);
// If a cookie named 'visits' does exist,
// then add 1 to the current value of the cookie,

// Using the setcookie( ) function, we can now assign
// values to our cookie. In this case, we need to assign
// the number of visits as its value.
// Let's also try to set an expiry date of one year from today,
// for this, we need to set its expiryTime

// Now, let's inclue the contents of our welcome.php page
include('welcome.php');
