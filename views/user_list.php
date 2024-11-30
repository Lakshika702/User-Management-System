<!-- views/user_list.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        h1 {
            color: #4CAF50;
            margin-bottom: 20px;
        }
        .search-container, .user-list-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 90%;
            max-width: 600px;
        }
        form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 70%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        li:last-child {
            border-bottom: none;
        }
        .username {
            font-weight: bold;
            color: #333;
        }
        a.delete-link {
            color: #d9534f;
            text-decoration: none;
            font-weight: bold;
        }
        a.delete-link:hover {
            color: #c9302c;
        }
        .back-link {
            margin-top: 20px;
            text-align: center;
        }
        .back-link a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="user-list-container">
    <h1>User List</h1>

    <!-- Search Form to Filter Users -->
    <div class="search-container">
        <form action="index.php?page=admin" method="GET">
            <input type="text" name="search" placeholder="Search users..." value="<?php echo htmlspecialchars($_GET['search'] ?? '', ENT_QUOTES); ?>" required>
            <input type="submit" value="Search">
        </form>
    </div>

    <!-- Display List of Users -->
    <ul>
        <?php
        // Ensure that $users is not null and contains data
        if (isset($users) && $users->num_rows > 0) {
            while ($user = $users->fetch_assoc()) { ?>
                <li>
                    <span class="username"><?php echo htmlspecialchars($user['username']); ?></span>
                    <a href="index.php?page=deleteUser&id=<?php echo $user['id']; ?>" class="delete-link" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </li>
            <?php }
        } else {
            echo "<p>No users found</p>";
        }
        ?>
    </ul>

    <!-- Link to go back to the Admin Panel -->
    <div class="back-link">
        <a href="index.php?page=admin">Back to Admin Panel</a>
    </div>
</div>

</body>
</html>
