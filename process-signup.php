<?php

// Name input validation

if (empty($_POST["name"])) {
    die("Name is required");
}

// Email input validation

if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Email is required");
}

// Password validation

if (strlen($_POST["password"]) < 12) {
    die("Password must be at least 12 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ($_POST["password"] !== $_POST["password_repeat"]) {
    die("Password repeated incorrectly");
}

// Password hashing

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

//print_r($_POST);
//var_dump($password_hash);

$mysqli = require __DIR__ . "/database.php";
$sql = "INSERT INTO user (name, email, password) VALUES (?,?,?)";
$stmt = $mysqli->stmt_init();
if (! $stmt->prepare($sql)) {
    die("Query error: " . $mysqli->error);
}
$stmt->bind_param("sss", $_POST["name"], $_POST["email"], $password_hash);

// Show error if user already exists
if ($stmt->execute()){
    //user doesn't exist
    header("Location: signup-successful.html");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("Email is already taken");
    }
    die("Insert data error: " . $mysqli->error . $mysqli->errno);
}

