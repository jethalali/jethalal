const express = require("express");
const mysql = require("mysql2");
const bcrypt = require("bcrypt");
const jwt = require("jsonwebtoken");
const cors = require("cors");

const app = express();
app.use(cors());
app.use(express.json());

const db = mysql.createConnection({
    host: "localhost",
    user: "root", // Your MySQL username
    password: "M@itru1304", // Your MySQL password
    database: "book_store",
});

// Connect to database
db.connect((err) => {
    if (err) throw err;
    console.log("Connected to database.");
});

// Routes
// User Registration
app.post("/api/register", async (req, res) => {
    const { username, email, password } = req.body;
    const hashedPassword = await bcrypt.hash(password, 10);

    const query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    db.query(query, [username, email, hashedPassword], (err, result) => {
        if (err) return res.status(500).send({ message: err.message });
        res.send({ message: "User registered successfully" });
    });
});

// User Login
app.post("/api/login", (req, res) => {
    const { email, password } = req.body;

    const query = "SELECT * FROM users WHERE email = ?";
    db.query(query, [email], async (err, results) => {
        if (err) return res.status(500).send({ message: err.message });
        if (results.length === 0) return res.status(400).send({ message: "Invalid credentials" });

        const user = results[0];
        const isPasswordValid = await bcrypt.compare(password, user.password);
        if (!isPasswordValid) return res.status(400).send({ message: "Invalid credentials" });

        const token = jwt.sign({ id: user.id }, "secretKey", { expiresIn: "1h" });
        res.send({ token, username: user.username });
    });
});

// Fetch Books
app.get("/api/books", (req, res) => {
    db.query("SELECT * FROM books", (err, results) => {
        if (err) return res.status(500).send({ message: err.message });
        res.send(results);
    });
});

// Start Server
const PORT = 5000;
app.listen(PORT, () => {
    console.log(`Server running on http://localhost:${PORT}`);
});
