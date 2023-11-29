<?php

$username = "gjjariwala";
$server = "db.cs.dal.ca";
$password = "YiH3mNppvn3eryT7aEp7erwgs";

try {

    $pdo = new PDO("mysql:host=db.cs.dal.ca;dbname=gjjariwala", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
} catch (Exception $e) {

    echo 'Unable to connect to the database server.' . $e->getMessage();

    exit();
}
