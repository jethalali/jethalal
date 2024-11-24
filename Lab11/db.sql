CREATE DATABASE college_complaints;

USE college_complaints;

-- Table for storing student credentials
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Table for storing complaints
CREATE TABLE complaints (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    complaint TEXT NOT NULL,
    status ENUM('Pending', 'Resolved') DEFAULT 'Pending',
    FOREIGN KEY (student_id) REFERENCES students(id)
);

-- Table for storing admin credentials
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insert default admin credentials
INSERT INTO admins (username, password) VALUES ('admin', MD5('admin123'));
