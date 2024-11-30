<!-- views/admin_panel.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        /* Admin Panel Container */
        .admin-panel {
            background-color: rgba(0, 0, 0, 0.75); /* Subtle dark overlay */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            max-width: 60%;
            margin: auto;
        }

        /* Admin Header */
        .admin-header h1 {
            font-size: 2.5em;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .admin-header p {
            font-size: 1.2em;
            color: #d3d3d3;
        }

        /* Search Section */
        .search-section {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .search-section h2 {
            font-size: 1.8em;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .search-section input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 75%;
            margin-right: 10px;
        }

        .search-section .submit-btn {
            padding: 10px 20px;
            background-color: #5c6bc0;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-section .submit-btn:hover {
            background-color: #3f51b5;
        }

        /* User List */
        .user-list h2 {
            font-size: 1.8em;
            color: #ffffff;
            margin-bottom: 15px;
        }

        .user-list ul {
            list-style: none;
            padding: 0;
        }

        .user-list ul li {
            display: flex;
            justify-content: space-between;
            padding: 12px;
            background-color: rgba(255, 255, 255, 0.1);
            margin-bottom: 8px;
            border-radius: 5px;
            color: #ffffff;
        }

        .user-list ul li a {
            color: #e53935;
            text-decoration: none;
            font-weight: bold;
        }

        .user-list ul li a:hover {
            color: #d32f2f;
        }

        /* Admin Navigation */
        .admin-nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .admin-nav-item {
            font-size: 1.2em;
            color: #5c6bc0;
            text-decoration: none;
        }

        .admin-nav-item:hover {
            color: #3f51b5;
        }
    </style>
</head>
<body>
    <div class="admin-panel">
        <!-- Header for Admin Panel -->
        <div class="admin-header">
            <h1>Welcome to Admin Panel</h1>
            <p>Manage Users and Control System Settings</p>
        </div>

        <!-- Search Form Section -->
        <div class="search-section">
            <h2>Search Users</h2>
            <form action="index.php?page=admin" method="GET">
                <div class="form-group">
                    <input type="text" name="search" placeholder="Search users..." value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>" required>
                    <button type="submit" class="submit-btn">Search</button>
                </div>
            </form>
        </div>

        <!-- User List Section -->
        <div class="user-list">
            <h2>User List</h2>
            <ul>
                <?php 
                // Example list of users
                if (isset($users) && $users->num_rows > 0) {
                    while ($user = $users->fetch_assoc()) { ?>
                        <li>
                            <span><?php echo htmlspecialchars($user['username']); ?></span>
                            <a href="index.php?page=deleteUser&id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                        </li>
                    <?php } 
                } else {
                    echo "<p>No users found</p>";
                }
                ?>
            </ul>
        </div>
        
        <!-- Admin Navigation -->
        <div class="admin-nav">
            <a href="index.php?page=logout" class="admin-nav-item">Logout</a>
            <a href="index.php?page=dashboard" class="admin-nav-item">Go to Dashboard</a>
        </div>
    </div>
</body>
</html>
