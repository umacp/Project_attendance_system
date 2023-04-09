<?php
session_start();

$user_type = $_GET['user_type'];
if($user_type == 'student') {
    header('Location: ./student.php');
} else if($user_type == 'faculty') {
    header('Location: ./faculty.php');
}
if (isset($_SESSION['user'])) {
    // header('Location: ./dashboard.php');
}
?>