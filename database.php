<?php

// Database connection settings

$dsn = "mysql:host=localhost;dbname=todolist";
$db_user = 'root';
$db_pass = ' ';

try {
    // Create PDO connection
    $db = new PDO($dsn, $db_user);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Display Success Message
    $Success_message = "Connected to database successfully!";
    echo $Success_message;
} catch (PDOException $e) {
    // Catch any errors and display
    $error_message = "Database Error ";
    $error_message .= " " . $e->getMessage();
    echo $error_message;
    exit();
}