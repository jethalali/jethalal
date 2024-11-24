import React, { useState } from 'react';
import axios from 'axios';

const ResultForm = () => {
    const [studentId, setStudentId] = useState('');
    const [subject1Mse, setSubject1Mse] = useState('');
    const [subject1Ese, setSubject1Ese] = useState('');
    const [subject2Mse, setSubject2Mse] = useState('');
    const [subject2Ese, setSubject2Ese] = useState('');
    const [subject3Mse, setSubject3Mse] = useState('');
    const [subject3Ese, setSubject3Ese] = useState('');
    // const [subject4Mse, setSubject4Mse] = useState('');
    // const [subject4Ese, setSubject4Ese] = useState('');
    const [finalResult, setFinalResult] = useState(null);

    const handleSubmit = async (e) => {
        e.preventDefault();
        const resultData = {
            student_id: studentId,
            subject1_mse: subject1Mse,
            subject1_ese: subject1Ese,
            subject2_mse: subject2Mse,
            subject2_ese: subject2Ese,
            subject3_mse: subject3Mse,
            subject3_ese: subject3Ese
            // subject4_mse: subject4Mse,
            // subject4_ese: subject4Ese
        };

        try {
            const response = await axios.post('http://localhost:8080/api/results', resultData);
            setFinalResult(response.data.finalResult);
        } catch (error) {
            console.error('There was an error!', error);
        }
    };

    return (
        <div className="container mt-5">
            <h1>VIT Semester Result Calculator</h1>
            <form onSubmit={handleSubmit}>
                <div className="mb-3">
                    <label>Student ID</label>
                    <input type="text" className="form-control" value={studentId} onChange={e => setStudentId(e.target.value)} />
                </div>
                <div className="mb-3">
                    <label>Subject 1 MSE Marks</label>
                    <input type="number" className="form-control" value={subject1Mse} onChange={e => setSubject1Mse(e.target.value)} />
                </div>
                <div className="mb-3">
                    <label>Subject 1 ESE Marks</label>
                    <input type="number" className="form-control" value={subject1Ese} onChange={e => setSubject1Ese(e.target.value)} />
                </div>
                <div className="mb-3">
                    <label>Subject 2 MSE Marks</label>
                    <input type="number" className="form-control" value={subject2Mse} onChange={e => setSubject2Mse(e.target.value)} />
                </div>
                <div className="mb-3">
                    <label>Subject 2 ESE Marks</label>
                    <input type="number" className="form-control" value={subject2Ese} onChange={e => setSubject2Ese(e.target.value)} />
                </div>
                <div className="mb-3">
                    <label>Subject 3 MSE Marks</label>
                    <input type="number" className="form-control" value={subject3Mse} onChange={e => setSubject3Mse(e.target.value)} />
                </div>
                <div className="mb-3">
                    <label>Subject 3 ESE Marks</label>
                    <input type="number" className="form-control" value={subject3Ese} onChange={e => setSubject3Ese(e.target.value)} />
                </div>
                {/* Repeat similar fields for subject 2, 3, and 4 */}

                <button type="submit" className="btn btn-primary">Calculate Result</button>
            </form>

            {finalResult !== null && (
                <div className="mt-3">
                    <h3>Final Result: {finalResult}</h3>
                </div>
            )}
        </div>
    );
};

export default ResultForm;