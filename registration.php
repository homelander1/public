<?php

function registrationForm($data)
{
    $dbserver = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dynamicweb";

    $conn = mysqli_connect($dbserver, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use null coalescing operator to avoid undefined index warnings
    $first_name = trim($data["first_name"] ?? '');
    $last_name = trim($data["last_name"] ?? '');
    $email = trim($data["email"] ?? '');
    $password = $data["password"] ?? '';
    $confirm_password = $data["confirm_password"] ?? '';

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (email, password, first_name, last_name, registration_date) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssss", $email, $hashed_password, $first_name, $last_name);

    // Execute the statement
    if (!$stmt->execute()) {
        die("Error executing query: " . $stmt->error);
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
}

// Logging into account
function loginUser($data)
{
    $dbserver = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dynamicweb";

    $conn = mysqli_connect($dbserver, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = trim($data["login"] ?? '');
    $password = $data["password"] ?? '';

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT user_id, first_name, last_name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows === 0) {
        die("No user found with this email.");
    }

    // Bind the result
    $stmt->bind_result($user_id, $first_name, $last_name, $hashed_password);
    $stmt->fetch();

    // Verify the password
    if (!password_verify($password, $hashed_password)) {
        die("Invalid password.");
    }

    // Store user information in session
    session_start();
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['logged_in'] = true;  // Add this line to track login status

    // Redirect to user.php
    header("Location: user.php");
    exit();

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
}
