<?php

$username = "gjjariwala";
$server = "db.cs.dal.ca";
$password = "9p9HTgWS5K9HAJWn36wJpB2Ai";

try {

    $pdo = new PDO("mysql:host=db.cs.dal.ca;dbname=gjjariwala", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
} catch (Exception $e) {

    echo 'Unable to connect to the database server.' . $e->getMessage();

    exit();
}

echo 'Database connection established';
