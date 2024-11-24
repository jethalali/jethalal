<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Employee List</title>
</head>
<body>
    <h1>Employee List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $stmt = $conn->query("SELECT * FROM employees");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['position']}</td>
                        <td>{$row['salary']}</td>
                    </tr>";
                }
            } catch (PDOException $e) {
                echo "<tr><td colspan='5'>Error: " . $e->getMessage() . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>