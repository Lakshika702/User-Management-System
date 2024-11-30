<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #4caf50, #81c784);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-container {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            border-radius: 10px;
            box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.2);
            width: 400px;
            padding: 30px 20px;
            text-align: center;
        }

        /* Header Section */
        .header {
            background: url('https://images.unsplash.com/photo-1527181152855-fc03fc7949c8') ;
            background-size: cover;
            height: 150px;
            text-align: center;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        .header h1 {
            font-size: 1.8em;
            font-weight: bold;
        }

        /* Form Section */
        .form-container {
            padding: 20px 30px;
            text-align: center;
        }

        .form-container h2 {
            color: #333;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            font-size: 0.9em;
            color: #555;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1) inset;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus, input[type="email"]:focus {
            border-color: #4caf50;
            outline: none;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: bold;
            transition: background-color 0.3s ease;
            box-shadow: 0px 4px 10px rgba(76, 175, 80, 0.4);
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            font-size: 0.9em;
            color: #555;
            margin-top: 20px;
        }

        a {
            color: #4caf50;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .register-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <!-- Header Section -->
        <div class="header">
            <h1>Welcome to the User Management System</h1>
        </div>

        <!-- Form Section -->
        <div class="form-container">
            <h2>Create a New Account</h2>
            <form action="/mvc_system/public/index.php?page=register" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Register">
            </form>

            <p>Already have an account? <a href="index.php?page=login">Login here</a></p>
        </div>
    </div>
</body>
</html>
