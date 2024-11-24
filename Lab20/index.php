<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Electricity Bill Calculator</h2>
        <form id="billForm" action="calculate.php" method="POST">
            <div class="mb-3">
                <label for="units" class="form-label">Enter Number of Units</label>
                <input type="number" class="form-control" id="units" name="units" required min="1">
            </div>
            <button type="submit" class="btn btn-primary">Calculate Bill</button>
        </form>

        <div id="result" class="mt-4"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
