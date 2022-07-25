<?php

// This file creates a connection to the database.

// Global variables used in the other database related PHP files.
$_DATABASE = "hays";
$_TABLE = "users";

// Database local configuration.
// Must be changed to match the local MySQL database.
$host = "127.0.0.1";
$username = "username";
$password = "password";

$db = new mysqli($host, $username, $password);

// Check connection.
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
