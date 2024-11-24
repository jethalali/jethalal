<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Currency Converter</title>
</head>
<body>
    <div class="converter-container">
        <h1>Currency Converter</h1>
        <form method="POST">
            <label for="dollar">Enter Amount in USD:</label>
            <input type="text" id="dollar" name="dollar" placeholder="Enter USD amount" required>
            <button type="submit">Convert to INR</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $exchangeRate = 82.5; // Hard-coded exchange rate
            $dollar = $_POST['dollar'];

            if (is_numeric($dollar)) {
                $rupees = $dollar * $exchangeRate;
                echo "<p><strong>$dollar USD</strong> = <strong>" . number_format($rupees, 2) . " INR</strong></p>";
            } else {
                echo "<p class='error'>Please enter a valid number.</p>";
            }
        }
        ?>
    </div>
</body>
</html>