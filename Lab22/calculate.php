<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_name = $_POST['student_name'];
    $subject1_mse = $_POST['subject1_mse'];
    $subject1_ese = $_POST['subject1_ese'];
    $subject2_mse = $_POST['subject2_mse'];
    $subject2_ese = $_POST['subject2_ese'];
    $subject3_mse = $_POST['subject3_mse'];
    $subject3_ese = $_POST['subject3_ese'];
    $subject4_mse = $_POST['subject4_mse'];
    $subject4_ese = $_POST['subject4_ese'];

    // Calculate total marks for each subject
    $subject1_total = ($subject1_mse * 0.30) + ($subject1_ese * 0.70);
    $subject2_total = ($subject2_mse * 0.30) + ($subject2_ese * 0.70);
    $subject3_total = ($subject3_mse * 0.30) + ($subject3_ese * 0.70);
    $subject4_total = ($subject4_mse * 0.30) + ($subject4_ese * 0.70);

    // Calculate overall total and grade
    $total_marks = $subject1_total + $subject2_total + $subject3_total + $subject4_total;
    
    if ($total_marks >= 75) {
        $grade = 'A';
    } elseif ($total_marks >= 60) {
        $grade = 'B';
    } elseif ($total_marks >= 50) {
        $grade = 'C';
    } else {
        $grade = 'D';
    }

    // Save result into the database
    $sql = "INSERT INTO results (student_name, subject1_mse, subject1_ese, subject2_mse, subject2_ese, subject3_mse, subject3_ese, subject4_mse, subject4_ese, total_marks, grade) 
            VALUES ('$student_name', '$subject1_mse', '$subject1_ese', '$subject2_mse', '$subject2_ese', '$subject3_mse', '$subject3_ese', '$subject4_mse', '$subject4_ese', '$total_marks', '$grade')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>
                <h4 class='alert-heading'>Result for $student_name</h4>
                <p>Total Marks: $total_marks</p>
                <p>Grade: $grade</p>
              </div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
