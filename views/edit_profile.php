<!-- views/edit_profile.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
            padding: 10px;
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
            width: 50%;
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
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        header { background-color: #4CAF50; color: white; padding: 10px 20px; text-align: center; }
        .container { padding: 20px; }
      
    </style>
</head>
<body>


<header>
<h1>Edit Profile</h1>

</header><br>

<!-- Check for success or error messages -->
<?php if (isset($message)) { echo "<p>$message</p>"; } ?>

<form action="index.php?page=editProfile" method="POST">
<div style="margin-left: 20px; margin-top: 20px;">
    <label for="username" style="margin-right: 10px;">Username:</label>
    <input type="text" id="username" name="username" 
           value="<?php echo htmlspecialchars($user['username'] ?? ''); ?>" required>
</div>


<div style="margin-left: 20px; margin-top: 20px;">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>" required><br><br>
    </div>
    

<div style="margin-left: 20px; margin-top: 20px;">
    <label for="password">New Password (leave blank if not changing):</label>
    <input type="password" name="password"><br><br>
    </div>
 
<div style="margin-left: 20px; margin-top: 20px;">
   <b> <input type="submit" value="Update Profile"></b>
   </div>
</form>

<div style="margin-left: 20px; margin-top: 20px;">
<p><a href="index.php?page=profile">Back to Profile</a></p>
</div>

</body>
</html>
