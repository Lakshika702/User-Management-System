<?php
// controllers/AdminController.php
class AdminController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    // Display list of users with optional search functionality
    public function userList() {
        // Get search query if present
        $search = $_GET['search'] ?? '';
        
        // Fetch the users based on the search query
        $users = $this->userModel->searchUsersByName($search);
        
        // Ensure the query was successful and users data is valid
        if ($users && $users->num_rows > 0) {
            // Include the user list view and pass the $users variable
            include 'views/user_list.php';
        } else {
            // In case no users are found, handle it gracefully
            echo "No users found.";
        }
    }

    // Delete a user by their ID
    public function deleteUser($id) {
        // Call the delete method in the model
        $this->userModel->deleteUser($id);
        
        // Redirect back to the admin panel after deletion
        header('Location: index.php?page=admin');
        exit;
    }
}
?>
