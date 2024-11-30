<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Request</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Body Styling */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f8f5;
            color: #333;
        }

        /* Main Container */
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 128, 0, 0.2);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #4CAF50;
            margin-bottom: 20px;
            font-size: 1.5em;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            width: 100%;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 15px;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        a:hover {
            color: #388E3C;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Request Password Reset</h1>

    <!-- Password Reset Request Form -->
    <form action="index.php?page=passwordResetRequest" method="POST">
        <label for="email">Enter your email address:</label>
        <input type="email" name="email" placeholder="you@example.com" required>
        <input type="submit" value="Request Reset Link">
    </form>

    <p><a href="index.php?page=login">Back to Login</a></p>
</div>

</body>
</html>
