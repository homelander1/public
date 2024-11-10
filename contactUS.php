<?php

function processForm($data)
{
    $dbserver = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dynamicweb";

    // Establish connection
    $conn = mysqli_connect($dbserver, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use null coalescing operator to avoid undefined index warnings
    $name = trim($data["name"] ?? '');
    $email = trim($data["email"] ?? '');

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO subscribers (name, email, subscription_date) VALUES (?, ?, NOW())");
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
    }

    // Bind parameters
    $stmt->bind_param("ss", $name, $email);

    // Execute the statement
    if (!$stmt->execute()) {
        die("Execute failed: " . htmlspecialchars($stmt->error));
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}





// __construct - ask chatgpt as functional programming
