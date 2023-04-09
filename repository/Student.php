<?php
require __DIR__ . '/../utils/db/connection.php';

class Student {
    private $conn;

    public function __construct() {
        $this->conn = Connection::connect();
        $this->createStudentTable();
        $this->createAttendanceTable();
    }

    private function createStudentTable() {
        $sql = "CREATE TABLE IF NOT EXISTS students (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                roll_number VARCHAR(30) NOT NULL,
                password VARCHAR(30) NOT NULL,
                first_name VARCHAR(30) NOT NULL,
                last_name VARCHAR(30) NOT NULL,
                class VARCHAR(30) NOT NULL,
                branch VARCHAR(30) NOT NULL,
                semester VARCHAR(30) NOT NULL,
                created_at DATETIME
            )";

        if ($this->conn->query($sql) !== TRUE) {
            die("Error creating table: " . $this->conn->error);
        }
    }

    private function createAttendanceTable() {
        $sql = "CREATE TABLE IF NOT EXISTS attendance (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                roll_number VARCHAR(30) NOT NULL,
                subject VARCHAR(30) NOT NULL,
                faculty_id VARCHAR(30) NOT NULL,
                date DATE NOT NULL,
                status TINYINT(1) NOT NULL,
                created_at DATETIME
            )";

        if ($this->conn->query($sql) !== TRUE) {
            die("Error creating table: " . $this->conn->error);
        }
    }

    public function registerStudent($roll_number, $password, $first_name, $last_name, $class, $branch, $semester) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO students (roll_number, password, first_name, last_name, class, branch, semester, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssss", $roll_number, $hashed_password, $first_name, $last_name, $class, $branch, $semester);
        if ($stmt->execute()) {
            return array("success"=>true, "message"=>"Registration successful.");
        } else {
            return array("success"=>false, "message"=>"Error registering student: " . $stmt->error);
        }
    }

    public function login($roll_number, $password) {
        $query = "SELECT * FROM students WHERE roll_number = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $roll_number);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows === 0) {
            return array("success"=>false, "message"=>"Roll number not found.");
        }
    
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
    
        if (password_verify($password, $hashed_password)) {
            return array("success"=>true, "message"=>"Login successful.", "user"=>$row);
        } else {
            return array("success"=>false, "message"=>"Incorrect password.");
        }
    }

}
?>