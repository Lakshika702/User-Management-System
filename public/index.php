<?php
// public/index.php

// Include the config.php file to load database constants
include __DIR__ . '/../config/config.php';

// Include the necessary models and controllers
include __DIR__ . '/../models/User.php';
include __DIR__ . '/../controllers/UserController.php';
include __DIR__ . '/../controllers/AdminController.php';

// Initialize database connection with error handling
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($db->connect_error) {
    die("Database connection failed: " . $db->connect_error);
}

// Create instances of the models and controllers
$userModel = new User($db);
$userController = new UserController($userModel);
$adminController = new AdminController($userModel);

// Start the session to manage user login and account data
session_start();

// Get the "page" parameter to determine which page to load, default to 'login'
$page = $_GET['page'] ?? 'login';

// Main routing logic
try {
    switch ($page) {
        case 'register':
            $userController->register();
            break;

        case 'login':
            $userController->login();
            break;

        case 'profile':
            $userController->profile();
            break;

        case 'editAccount':    // For editing account
            $userController->editAccount();
            break;

        case 'saveEditAccount': // To handle saving the edited account data
            $userController->saveEditAccount();
            break;

        case 'logout':
            $userController->logout();
            break;

        case 'admin':
            $adminController->userList();
            break;

        case 'deleteUser':
            // Ensure 'id' parameter is provided for deleting a user
            if (isset($_GET['id'])) {
                $adminController->deleteUser($_GET['id']);
            } else {
                throw new Exception("User ID is required for deletion.");
            }
            break;

        default:
            // If page is unrecognized, load the login page
            $userController->login();
            break;
    }
} catch (Exception $e) {
    // Basic error handling for unhandled cases
    echo "<h3>Error: " . htmlspecialchars($e->getMessage()) . "</h3>";
}

?>
