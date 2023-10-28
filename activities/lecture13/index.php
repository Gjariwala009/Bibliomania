<?php

if (!isset($_COOKIE['username'])) {
    $_COOKIE['username'] = "";
}

$input = $_POST['user-input'];
setcookie("username", $input, time() + 3600 * 24);

include('welcome.php');
