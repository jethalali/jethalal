<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>String Transformer</title>
</head>
<body>
    <div class="container">
        <h1>String Transformer</h1>
        <form method="POST">
            <label for="inputString">Enter a string:</label>
            <input type="text" id="inputString" name="inputString" placeholder="Type your string here" required>
            <button type="submit">Transform</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $inputString = $_POST['inputString'];

            echo "<h2>Results:</h2>";

            // a) Transform to all uppercase letters
            $uppercase = strtoupper($inputString);
            echo "<p><strong>Uppercase:</strong> $uppercase</p>";

            // b) Transform to all lowercase letters
            $lowercase = strtolower($inputString);
            echo "<p><strong>Lowercase:</strong> $lowercase</p>";

            // c) Make the string's first character uppercase
            $firstCharUpper = ucfirst($inputString);
            echo "<p><strong>First Character Uppercase:</strong> $firstCharUpper</p>";

            // d) Make the first character of all the words uppercase
            $wordsFirstCharUpper = ucwords($inputString);
            echo "<p><strong>First Character of All Words Uppercase:</strong> $wordsFirstCharUpper</p>";
        }
        ?>
    </div>
</body>
</html>