<!-- views/edit_account.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        .container {
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="tel"], select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .success {
            color: green;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
    <script>
        // Basic JavaScript validation for password matching
        function validateForm() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            if (password !== confirmPassword) {
                document.getElementById('error-message').textContent = "Passwords do not match!";
                return false;
            }
            return true;
        }
    </script>
</head>
<body>

<header>
    <h1>Edit Account</h1>
</header>

<div class="container">
    <?php if (isset($errorMessage)) { ?>
        <div class="error"><?php echo htmlspecialchars($errorMessage); ?></div>
    <?php } elseif (isset($successMessage)) { ?>
        <div class="success"><?php echo htmlspecialchars($successMessage); ?></div>
    <?php } ?>

    <!-- views/edit_account.php -->
<form action="index.php?page=saveEditAccount" method="POST">
    <div class="form-group">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($user['first_name'] ?? ''); ?>" required>
    </div>
    <div class="form-group">
        <label for="second_name">Second Name:</label>
        <input type="text" id="second_name" name="second_name" value="<?php echo htmlspecialchars($user['second_name'] ?? ''); ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>" required>
    </div>
    <div class="form-group">
        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile" value="<?php echo htmlspecialchars($user['mobile'] ?? ''); ?>" required>
    </div>
    <div class="form-group">
        <label for="designation">Designation:</label>
        <input type="text" id="designation" name="designation" value="<?php echo htmlspecialchars($user['designation'] ?? ''); ?>" required>
    </div>
    <div class="form-group">
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male" <?php echo ($user['gender'] ?? '') == 'male' ? 'selected' : ''; ?>>Male</option>
            <option value="female" <?php echo ($user['gender'] ?? '') == 'female' ? 'selected' : ''; ?>>Female</option>
        </select>
    </div>
    <div class="form-group">
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password">
    </div>
    <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password">
    </div>
    <button type="submit">Save Changes</button>
</form>
</div>

</body>
</html>
