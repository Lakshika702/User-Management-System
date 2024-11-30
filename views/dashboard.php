<?php
session_start();

// Database connection details
$host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'mvc_system'; // Correct database name

// Connect to MySQL
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the logged-in user ID from session
$user_id = $_SESSION['user_id'] ?? null;

// Initialize user data
$user = [
    'first_name' => '',
    'second_name' => '',
    'email' => '',
    'gender' => '',
    'mobile' => '',
    'designation' => ''
];

if ($user_id) {
    // Fetch user data from the "users" table
    $stmt = $conn->prepare("SELECT first_name, second_name, email, gender, mobile, designation FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    }

    $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        header { background-color: #4CAF50; color: white; padding: 10px 20px; text-align: center; }
        .container { padding: 20px; }
        .account-info { margin-bottom: 20px; }
        .account-info h3 { margin-bottom: 5px; }
        .account-info p { margin: 5px 0; }
        .button { padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer; text-decoration: none; }
        .button:hover { background-color: #45a049; }
    </style>
</head>
<body>

<header>
    <h1>Dashboard</h1>
</header>

<div class="container">
    <div class="account-info">
        <h3>User Account Details</h3><br>
        <p><strong>First Name:</strong> <?php echo htmlspecialchars($user['first_name']); ?></p>
        <p><strong>Second Name:</strong> <?php echo htmlspecialchars($user['second_name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Password:</strong> ********</p>
        <p><strong>Gender:</strong> <?php echo ucfirst($user['gender']); ?></p>
        <p><strong>Mobile:</strong> <?php echo htmlspecialchars($user['mobile']); ?></p>
        <p><strong>Designation:</strong> <?php echo htmlspecialchars($user['designation']); ?></p>
    </div>

    <a href="index.php?page=editProfile" class="button">Edit Profile</a>
</div>

</body>
</html>