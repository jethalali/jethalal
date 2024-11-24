CREATE DATABASE book_store;

USE book_store;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

INSERT INTO books (title, author, price) VALUES
('The Great Gatsby', 'F. Scott Fitzgerald', 10.99),
('To Kill a Mockingbird', 'Harper Lee', 7.99),
('1984', 'George Orwell', 8.99);