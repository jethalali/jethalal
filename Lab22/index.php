<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semester Result Calculation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">VIT Semester Result Calculator</h2>
        <form action="calculate.php" method="POST">
            <div class="mb-3">
                <label for="student_name" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="student_name" name="student_name" required>
            </div>
            
            <!-- Subject 1 -->
            <div class="row">
                <div class="col">
                    <label for="subject1_mse" class="form-label">Subject 1 MSE Marks</label>
                    <input type="number" class="form-control" id="subject1_mse" name="subject1_mse" required min="0" max="30">
                </div>
                <div class="col">
                    <label for="subject1_ese" class="form-label">Subject 1 ESE Marks</label>
                    <input type="number" class="form-control" id="subject1_ese" name="subject1_ese" required min="0" max="70">
                </div>
            </div>
            
            <!-- Subject 2 -->
            <div class="row">
                <div class="col">
                    <label for="subject2_mse" class="form-label">Subject 2 MSE Marks</label>
                    <input type="number" class="form-control" id="subject2_mse" name="subject2_mse" required min="0" max="30">
                </div>
                <div class="col">
                    <label for="subject2_ese" class="form-label">Subject 2 ESE Marks</label>
                    <input type="number" class="form-control" id="subject2_ese" name="subject2_ese" required min="0" max="70">
                </div>
            </div>
            
            <!-- Subject 3 -->
            <div class="row">
                <div class="col">
                    <label for="subject3_mse" class="form-label">Subject 3 MSE Marks</label>
                    <input type="number" class="form-control" id="subject3_mse" name="subject3_mse" required min="0" max="30">
                </div>
                <div class="col">
                    <label for="subject3_ese" class="form-label">Subject 3 ESE Marks</label>
                    <input type="number" class="form-control" id="subject3_ese" name="subject3_ese" required min="0" max="70">
                </div>
            </div>

            <!-- Subject 4 -->
            <div class="row">
                <div class="col">
                    <label for="subject4_mse" class="form-label">Subject 4 MSE Marks</label>
                    <input type="number" class="form-control" id="subject4_mse" name="subject4_mse" required min="0" max="30">
                </div>
                <div class="col">
                    <label for="subject4_ese" class="form-label">Subject 4 ESE Marks</label>
                    <input type="number" class="form-control" id="subject4_ese" name="subject4_ese" required min="0" max="70">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Calculate Result</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
