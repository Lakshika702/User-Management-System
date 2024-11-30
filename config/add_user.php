<?php
// Database connection details
$host = 'localhost'; // Database host
$db_user = 'root';   // Database username
$db_pass = '';       // Database password
$db_name = 'mvc_system'; // Your database name

// Connect to MySQL
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Data to be inserted (this would normally come from a form or API request)
$username = 'john_doe';
$password = 'password123'; // Plain text password, will hash this
$email = 'john.doe@example.com';
$first_name = 'John';
$second_name = 'Doe';
$mobile = '1234567890';
$designation = 'Software Engineer';

// Hash the password before inserting
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare the SQL query
$stmt = $conn->prepare("INSERT INTO users (username, password, email, first_name, second_name, mobile, designation) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $username, $hashed_password, $email, $first_name, $second_name, $mobile, $designation);

// Execute the query
if ($stmt->execute()) {
    echo "New user added successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

