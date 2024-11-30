<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #D6EEF9, #5c6bc0);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        /* Container */
        .login-container {
            width: 100%;
            max-width: 600px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        /* Header Section */
        .login-header {
            background: url('https://images.unsplash.com/photo-1527030280862-64139fba04ca') no-repeat center center;
            background-size: cover;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.7);
        }

        .login-header h1 {
            font-size: 2.5em;
            color: #fff;
        }

        /* Login Form */
        .login-form {
            padding: 30px 40px;
            background-color: rgba(0, 0, 0, 0.8); /* Dark semi-transparent background */
            text-align: center;
        }

        .login-form h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #fff;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 1.1em;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #5c6bc0;
            outline: none;
            box-shadow: 0 0 8px rgba(92, 107, 192, 0.5);
        }

        .submit-btn {
            background-color: #5c6bc0;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background-color: #3f51b5;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-form {
                padding: 20px;
            }

            .login-header h1 {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Header Section -->
        <div class="login-header">
            <h1>Welcome to User Management System</h1>
        </div>

        <!-- Login Form -->
        <div class="login-form">
            <h2>Login</h2>

            <!-- Error Message if any -->
            <?php if (isset($error)): ?>
                <p class="error" style="color: #e53935;"><?php echo $error; ?></p>
            <?php endif; ?>

            <form action="index.php?page=login" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <input type="submit" value="Login" class="submit-btn">
            </form>
        </div>
    </div>
</body>
</html>
