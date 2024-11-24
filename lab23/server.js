const express = require('express');
const mysql = require('mysql2');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
const port = 8080;

// Middleware
app.use(cors());
app.use(bodyParser.json());

// Set up MySQL connection
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'M@itru1304',
  database: 'vit_students'
});

// Function to calculate the final result
function calculateResult(data) {
    const subject1Final = (data.subject1_mse * 0.30) + (data.subject1_ese * 0.70);
    const subject2Final = (data.subject2_mse * 0.30) + (data.subject2_ese * 0.70);
    const subject3Final = (data.subject3_mse * 0.30) + (data.subject3_ese * 0.70);
    // const subject4Final = (data.subject4_mse * 0.30) + (data.subject4_ese * 0.70);

    return (subject1Final + subject2Final + subject3Final) / 3;
}

// API route to calculate the result and save it to the database
app.post('/api/results', (req, res) => {
    const resultData = req.body;
    const finalResult = calculateResult(resultData);

    // Insert data into MySQL database
    const query = 'INSERT INTO results (student_id, subject1_mse, subject1_ese, subject2_mse, subject2_ese, subject3_mse, subject3_ese, final_result) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    const values = [
        resultData.student_id,
        resultData.subject1_mse,
        resultData.subject1_ese,
        resultData.subject2_mse,
        resultData.subject2_ese,
        resultData.subject3_mse,
        resultData.subject3_ese,
        // resultData.subject4_mse,
        // resultData.subject4_ese,
        finalResult
    ];

    db.query(query, values, (err, result) => {
        if (err) {
            return res.status(500).json({ error: 'Error saving the result.' });
        }
        res.json({ message: 'Result calculated and saved successfully', finalResult });
    });
});

// Start the server
app.listen(port, () => {
    console.log(`Server running on http://localhost:${port}`);
});
