<?php

// This file contains Index, Create and Read functions from standard CRUD controllers.

require __DIR__."/connection.php";

// Retrieve all users.
function index() {
    // Get global database connection and database name.
    global $db;
    global $_DATABASE;
    global $_TABLE;

    $sql = "SELECT * from $_DATABASE.$_TABLE";
    
    // Return false if there are no users.
    if (!$data = $db->query($sql)) {
        return false;
    }

    // Fetch result.
    $data->fetch_assoc();
    
    $db->close();

    return $data;
}

// Create a new user.
function create($username, $password, $email) {
    // Get global database connection and database name.
    global $db;
    global $_DATABASE;
    global $_TABLE;

    // Create statement.
    $stmt = $db->prepare("INSERT INTO $_DATABASE.$_TABLE (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);
    
    // Return false if the statement returns an error.
    if (!$stmt->execute()) {
        return false;
    }
    
    $stmt->close();

    return true;
}

// Retrieve one user.
function read($username, $password) {
    // Get global database connection and database name.
    global $db;
    global $_DATABASE;
    global $_TABLE;

    // Retrieve the given user.
    $stmt = $db->prepare("SELECT * FROM $_DATABASE.$_TABLE WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    // Return false if the statement throws an error.
    if (!$stmt->execute()) {
        return false;
    }

    // Get results.
    $data = $stmt->get_result();
    $data = $data->fetch_assoc();

    $db->close();

    return $data;
}