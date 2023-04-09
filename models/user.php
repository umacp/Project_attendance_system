
<?php
require_once __DIR__ . '/../utils/db/connection.php';

class Faculty {
    private $conn;

    public function __construct() {
        $this->conn = connection::connect();
        $this->createFacultyTable();
    }

    private function createFacultyTable() {
        $sql = "CREATE TABLE IF NOT EXISTS faculty (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                faculty_id VARCHAR(30) NOT NULL,
                faculty_name VARCHAR(255) NOT NULL default '',
                password VARCHAR(255) NOT NULL,
                last_login DATETIME,
                created_at DATETIME
            )";

        if ($this->conn->query($sql) !== TRUE) {
            die("Error creating table: " . $this->conn->error);
        }
    }

    
   
    public function registerFaculty($faculty_id, $faculty_name, $password) {
        // Check if the faculty ID is already in use
        $query = "SELECT * FROM faculty WHERE faculty_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $faculty_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            return array("success" => false, "message" => "Faculty member already registered.");
       
        }
    
        // Insert the faculty member into the faculty table
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO faculty (faculty_id, faculty_name, password, created_at) VALUES (?, ?, ?, NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $faculty_id, $faculty_name, $hashed_password);
        if ($stmt->execute()) {
            return array("success" => true, "message" => "Registration successful.");
    
        } else {
            return array("success" => false, "message" => "Error registering faculty member: " . $stmt->error);
   
        }
    }
    
    

    public function login($faculty_id, $password) {
        $query = "SELECT * FROM faculty WHERE faculty_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $faculty_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return array("success"=>false,"message"=>"Faculty ID not found.");
        }

        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            // Update the last_login column in the faculty table
            $query = "UPDATE faculty SET last_login = NOW() WHERE faculty_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("s", $faculty_id);
            $stmt->execute();
            return array("success"=>true,"message"=>"Login Successful.");
        } else {
            return  array("success"=>false,"message"=>"incorrect Password");;
        }
    }
}
$user = new Faculty();

echo $user->login("FACULTY01", "password");
?>