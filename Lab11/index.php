<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM students WHERE username = :username AND password = MD5(:password)");
    $stmt->execute(['username' => $username, 'password' => $password]);
    $student = $stmt->fetch();

    if ($student) {
        $_SESSION['student_id'] = $student['id'];
        header('Location: complaint.php');
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Student Login</h1>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    </div>
</body>
</html>