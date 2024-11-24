<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Add Employee</title>
</head>
<body>
    <h1>Add Employee</h1>
    <form action="add.php" method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Position:</label>
        <input type="text" name="position"><br>

        <label>Salary:</label>
        <input type="number" step="0.01" name="salary"><br>

        <button type="submit">Add Employee</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];

        try {
            $sql = "INSERT INTO employees (name, email, position, salary) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $email, $position, $salary]);
            echo "<p>Employee added successfully!</p>";
        } catch (PDOException $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>";
        }
    }
    ?>
</body>
</html>