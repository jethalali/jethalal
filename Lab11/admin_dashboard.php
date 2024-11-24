<?php
include 'db.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}

$stmt = $conn->prepare("SELECT complaints.id, students.username, complaints.complaint, complaints.status 
                        FROM complaints
                        JOIN students ON complaints.student_id = students.id");
$stmt->execute();
$complaints = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Complaints</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student</th>
                    <th>Complaint</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($complaints as $complaint): ?>
                <tr>
                    <td><?= $complaint['id'] ?></td>
                    <td><?= $complaint['username'] ?></td>
                    <td><?= $complaint['complaint'] ?></td>
                    <td><?= $complaint['status'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
