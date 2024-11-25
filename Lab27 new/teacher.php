<?php
include('db.php');
session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Mark Attendance</title>
</head>
<body>
    <h1>Mark Attendance</h1>
    <form method="POST" action="mark_attendance.php">
        <table>
            <thead>
                <tr>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Present</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM students");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['roll_no']}</td>
                            <td>{$row['name']}</td>
                            <td><input type='checkbox' name='attendance[{$row['id']}]' value='Present'></td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
        <button type="submit">Submit Attendance</button>
    </form>
</body>
</html>