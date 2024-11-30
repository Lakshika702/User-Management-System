<?php
// models/User.php
class User {
    private $db;

    // Constructor that accepts a database connection
    public function __construct($db) {
        $this->db = $db;
    }

    // Fetch all users
    public function getAllUsers() {
        // Prepare and execute the query
        $query = "SELECT * FROM users";

        // Execute the query and check if the result is valid
        $result = $this->db->query($query);

        // Check if the query was successful
        if ($result === false) {
            die('Error executing query: ' . $this->db->error);  // Error handling for query failure
        }

        return $result;  // Returns a MySQLi result object
    }


    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Method to update user information
    public function updateUser($id, $firstName, $secondName, $email, $mobile, $designation, $gender, $password) {
        $sql = "UPDATE users SET first_name = ?, second_name = ?, email = ?, mobile = ?, designation = ?, gender = ?";
        
        // Append password if it’s provided
        $params = [$firstName, $secondName, $email, $mobile, $designation, $gender];
        if (!empty($password)) {
            $sql .= ", password = ?";
            $params[] = password_hash($password, PASSWORD_BCRYPT);
        }
        $sql .= " WHERE id = ?";

        $stmt = $this->db->prepare($sql);
        $params[] = $id;
        $stmt->bind_param(str_repeat("s", count($params) - 1) . "i", ...$params);
        $stmt->execute();
    }
    

    // Register a new user
    public function register($username, $password, $email) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $username, $passwordHash, $email);
        return $stmt->execute();
    }
    public function searchUsersByName($search = '') {
        $query = "SELECT * FROM users WHERE username LIKE ?";
        
        // Prepare the query
        $stmt = $this->db->prepare($query);
        $searchTerm = '%' . $search . '%';
        $stmt->bind_param('s', $searchTerm);  // 's' means string
        $stmt->execute();
        
        // Get the result
        return $stmt->get_result();
    }

    // Method to log in a user
    public function login($username, $password) {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Check if the user exists and verify password
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Return user data if credentials are correct
        }
        return false; // Return false if invalid login
    }

    

}

?>
