<!-- views/profile.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            width: 90%;
            max-width: 500px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            text-align: center;
        }

        h1 {
            color: #4CAF50;
            font-size: 2em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.1em;
            color: #333;
            margin: 10px 0;
        }

        .profile-info {
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 20px;
            font-size: 1em;
            color: #ffffff;
            background-color: #4CAF50;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #45a049;
        }

        .back-login a {
            color: #4CAF50;
            background-color: #ffffff;
            font-weight: bold;
            border: 2px solid #4CAF50;
        }

        .back-login a:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>

        <?php if (isset($user)): ?>
            <!-- Display the user's profile -->
            <div class="profile-info">
                <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><strong>Account Created At:</strong> <?php echo htmlspecialchars($user['created_at']); ?></p>
            </div>

            <!-- Edit Profile Link -->
            <a href="index.php?page=editProfile">Edit Profile</a>

            <!-- Logout Link -->
            <a href="index.php?page=logout">Logout</a>

        <?php else: ?>
            <!-- If no user is logged in -->
            <p>No user profile found. Please log in.</p>
            <div class="back-login">
                <a href="index.php?page=login">Go to Login</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
