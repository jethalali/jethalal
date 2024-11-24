<?php
session_start();
include('db.php');

// Check if teacher is logged in (this can be managed with session variables, or login system for the teacher)
if (!isset($_SESSION['teacher_id'])) {
    header('Location: teacher_login.php');
    exit();
}

// Fetch all students from the database
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Take Attendance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Mark Attendance</h2>
        <form action="mark_attendance.php" method="POST">
            <?php
            while ($row = $result->fetch_assoc()) {
                echo '<input type="checkbox" name="students[]" value="' . $row['id'] . '"> ' . $row['name'] . ' (' . $row['roll_no'] . ')<br>';
            }
            ?>
            <button type="submit">Submit Attendance</button>
        </form>
    </div>
</body>
</html>

<?php $conn->close(); ?>
