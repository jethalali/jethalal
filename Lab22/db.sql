CREATE DATABASE student_results;

USE student_results;

CREATE TABLE results (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100),
    subject1_mse INT(3),
    subject1_ese INT(3),
    subject2_mse INT(3),
    subject2_ese INT(3),
    subject3_mse INT(3),
    subject3_ese INT(3),
    subject4_mse INT(3),
    subject4_ese INT(3),
    total_marks DECIMAL(5,2),
    grade VARCHAR(2)
);
