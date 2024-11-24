<?php
include 'db.php';
session_start();

if (!isset($_SESSION['student_id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $complaint = $_POST['complaint'];
    $student_id = $_SESSION['student_id'];

    $stmt = $conn->prepare("INSERT INTO complaints (student_id, complaint) VALUES (:student_id, :complaint)");
    $stmt->execute(['student_id' => $student_id, 'complaint' => $complaint]);
    $success = "Complaint submitted successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Complaint</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Register Complaint</h1>
        <form method="POST">
            <textarea name="complaint" placeholder="Write your complaint here..." required></textarea>
            <button type="submit">Submit Complaint</button>
        </form>
        <?php if (!empty($success)) echo "<p class='success'>$success</p>"; ?>
    </div>
</body>
</html>
