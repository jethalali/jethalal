<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $attendance = $_POST['attendance'];
    $date = date("Y-m-d");

    foreach ($attendance as $student_id => $status) {
        $stmt = $conn->prepare("INSERT INTO attendance (student_id, date, status) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $student_id, $date, $status);
        $stmt->execute();
    }

    echo "Attendance marked successfully!";
}
?>
