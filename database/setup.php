<?php

// This files contains the script to create the database and the table for this program.

require __DIR__."/connection.php";

// Get global database connection.
global $db;
global $_DATABASE;
global $_TABLE;

// Create database.
$sql = "CREATE DATABASE IF NOT EXISTS $_DATABASE";
$database_enabled = $db->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS $_DATABASE.$_TABLE (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(55) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(55) NOT NULL
)";

// Display whether the database has been created or not.
$database_enabled = $db->query($sql);

// Insert a test user into the database.
$username = "test";
$password = hash("sha256", "test1234");
$email = "test@email.com";

// Check if a test user already exists.
$sql = $db->query("SELECT * FROM $_DATABASE.$_TABLE WHERE username = 'test'");

if ($sql->num_rows == 0) {

    $sql = $db->prepare("INSERT INTO $_DATABASE.$_TABLE (username, password, email) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $username, $password, $email);
    $sql->execute();

}

$db->close();