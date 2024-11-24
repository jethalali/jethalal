<?php
session_start();
include('db.php');

// Check if the teacher is logged in
if (!isset($_SESSION['teacher_id'])) {
    header('Location: teacher_login.php');
    exit();
}

// Check if students were selected
if (isset($_POST['students'])) {
    $students = $_POST['students'];
    $date = date('Y-m-d'); // Attendance date

    foreach ($students as $student_id) {
        // Mark attendance as present
        $sql = "INSERT INTO attendance (student_id, date, status) VALUES ('$student_id', '$date', 'Present')";
        $conn->query($sql);
    }

    echo "Attendance has been marked successfully!";
}

$conn->close();
?>
