<?php

class Attendance {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    public function markAttendance($date, $hour, $subject_id, $absent_roll_numbers) {
        // First, get the class associated with the subject
        $query = "SELECT class FROM subjects WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $subject_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows === 0) {
            return array("success"=>false, "message"=>"Subject not found.");
        }
    
        $row = $result->fetch_assoc();
        $class = $row['class'];
    
        // Then, get the list of students in that class
        $query = "SELECT roll_number FROM students WHERE class = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $class);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows === 0) {
            return array("success"=>false, "message"=>"No students found in class.");
        }
    
        $present_roll_numbers = array();
        while ($row = $result->fetch_assoc()) {
            $present_roll_numbers[] = $row['roll_number'];
        }
    
        // Finally, mark all absent roll numbers for that date, hour, and subject
        $absent_roll_numbers = array_map('intval', $absent_roll_numbers); // Convert to int array
        $query = "INSERT INTO attendance (date, hour, subject_id, roll_number, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        foreach ($present_roll_numbers as $roll_number) {
            $status = in_array($roll_number, $absent_roll_numbers) ? "Absent" : "Present";
            $stmt->bind_param("ssiss", $date, $hour, $subject_id, $roll_number, $status);
            $stmt->execute();
        }
    
        return array("success"=>true, "message"=>"Attendance marked successfully.");
    }
    
    public function viewAttendance($roll_number, $start_date, $end_date, $subject_id) {
        // Get the attendance data for the given roll number and date range
        $query = "SELECT date, hour, subject_id FROM attendance WHERE roll_number = ? AND date BETWEEN ? AND ?";
        if ($subject_id != '') {
            $query .= " AND subject_id = ?";
        }
        $stmt = $this->conn->prepare($query);
        if ($subject_id != '') {
            $stmt->bind_param("issi", $roll_number, $start_date, $end_date, $subject_id);
        } else {
            $stmt->bind_param("iss", $roll_number, $start_date, $end_date);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return array("success"=>false, "message"=>"No attendance data found.");
        }

        $attendance_data = array();
        while ($row = $result->fetch_assoc()) {
            $attendance_data[] = array(
                "date" => $row['date'],
                "hour" => $row['hour'],
                "subject_id" => $row['subject_id']
            );
        }

        return array("success"=>true, "attendance_data"=>$attendance_data);
    }
}




?>