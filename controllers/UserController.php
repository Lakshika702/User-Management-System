<?php
// controllers/UserController.php

class UserController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function register() {
        if ($_POST) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/", $password)) {
                echo "Password must be at least 8 characters long, contain one uppercase letter, one lowercase letter, one number, and one special character.";
                return;
            }
    
            // Validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format.";
                return;
            }
    
            // Validate password strength
            if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
                echo "Password must be at least 8 characters long, contain an uppercase letter, and a number.";
                return;
            }
    
            // Register the user
            if ($this->userModel->register($username, $password, $email)) {
                echo "Registration successful!";
                header('Location: index.php?page=login'); // Redirect to login page
            } else {
                echo "An error occurred during registration. Please try again.";
            }
        } else {
            include 'views/register.php';
        }
    }
    public function passwordResetRequest() {
        if ($_POST) {
            $email = $_POST['email'];
            // Check if the email exists
            $user = $this->userModel->getUserByEmail($email);
            if ($user) {
                // Generate a token and save it to the database
                $token = bin2hex(random_bytes(50)); // Generate random token
                $this->userModel->saveResetToken($user['id'], $token);
    
                // Send the password reset link (for now we just show it)
                echo "Password reset link: <a href='index.php?page=passwordResetForm&token=$token'>Click here</a>";
            } else {
                echo "No account found with that email.";
            }
        } else {
            include 'views/password_reset_request.php';
        }
        
    }
    
    public function passwordResetForm() {
        $token = $_GET['token'] ?? '';
        if ($_POST) {
            $password = $_POST['password'];
            $this->userModel->resetPassword($token, $password);
            echo "Password reset successfully!";
        } else {
            include 'views/password_reset_form.php';
        }
    }
    

    // controllers/UserController.php
public function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->userModel->login($username, $password);

        if ($user) {
            // User found, start session and redirect to profile
            $_SESSION['user'] = $user;
            header("Location: /mvc_system/public/index.php?page=profile");
            exit();
        } else {
            // Invalid credentials
            $error = 'Invalid username or password.';
            include __DIR__ . '/../views/login.php';
        }
    } else {
        // If GET request, show login form
        include 'views/login.php';
    }
}
public function profile() {
    // Assuming the user is logged in, check the session or other mechanism
    session_start(); // Start the session if it's not already started

    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Retrieve user data from the database
        $user = $this->userModel->getUserById($user_id); // Make sure this method exists

        // Pass user data to the view (profile.php)
        include 'views/profile.php';
    } else {
        // If not logged in, redirect to login page or show an error
        header('Location: index.php?page=login');
        exit;
    }
}
    
    public function editProfile() {
        session_start();
        if (isset($_SESSION['user'])) {
            $userId = $_SESSION['user']['id'];
    
            if ($_POST) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
    
                if (!empty($password)) {
                    // Update the password if provided
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $this->userModel->editProfile($userId, $username, $email, $passwordHash);
                } else {
                    $this->userModel->editProfile($userId, $username, $email);
                }
    
                header('Location: index.php?page=profile'); // Redirect to profile page after updating
            } else {
                $user = $this->userModel->getUserById($userId);
                include 'views/edit_profile.php';
            }
        } else {
            header('Location: index.php?page=login');
        }
    }
    

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?page=login');
    }

   // This method displays the user dashboard
   public function dashboard() {
    session_start(); // Start the session to access session variables

    // Check if the user is logged in by checking session or token
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Fetch user data from the database
        $user = $this->userModel->getUserById($user_id); // Fetch user data using a method from User model

        // If user is found, pass user data to the view
        if ($user) {
            include 'views/dashboard.php';
        } else {
            // If no user found, redirect to login page
            header('Location: index.php?page=login');
            exit;
        }
    } else {
        // Redirect to login if user is not logged in
        header('Location: index.php?page=login');
        exit;
    }
}
    
    
public function editAccount() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?page=login"); // Redirect if not logged in
        exit;
    }

    // Fetch the user data
    $user = $this->userModel->getUserById($_SESSION['user_id']);

    // Pass the user data to the view
    include __DIR__ . '/../views/edit_account.php';
}

// Method to handle form submission for editing account
public function saveEditAccount() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?page=login"); // Redirect if not logged in
        exit;
    }

    // Process form data
    $firstName = $_POST['first_name'] ?? '';
    $secondName = $_POST['second_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $designation = $_POST['designation'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate and update the user
    $this->userModel->updateUser($_SESSION['user_id'], $firstName, $secondName, $email, $mobile, $designation, $gender, $password);

    // Redirect to the profile or another page after update
    header("Location: index.php?page=profile");
}
}
?>
